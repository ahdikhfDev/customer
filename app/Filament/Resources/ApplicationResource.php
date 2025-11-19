<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Models\Application;
use App\Models\QueueTicket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    // Icon di sidebar admin
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    // Label menu
    protected static ?string $navigationLabel = 'Verifikasi Pengajuan';
    protected static ?string $modelLabel = 'Pengajuan';
    protected static ?string $pluralModelLabel = 'Daftar Pengajuan';

    // --- FORM (Untuk Halaman Detail / View) ---
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section 1: Data Diri
                Forms\Components\Section::make('Data Pemohon')
                    ->description('Informasi yang diinputkan oleh pemohon.')
                    ->schema([
                        Forms\Components\TextInput::make('ticket_token')
                            ->label('Token Registrasi')
                            ->readOnly(),
                        Forms\Components\TextInput::make('applicant_name')
                            ->label('Nama Lengkap')
                            ->readOnly(),
                        Forms\Components\TextInput::make('applicant_email')
                            ->label('Email')
                            ->readOnly(),
                        Forms\Components\TextInput::make('applicant_phone')
                            ->label('No. Telepon')
                            ->readOnly(),
                        Forms\Components\TextInput::make('applicant_category')
                            ->label('Kategori User')
                            ->readOnly(),
                        Forms\Components\TextInput::make('service.name') // Relasi ke Service
                            ->label('Layanan Dipilih')
                            ->readOnly(),
                        Forms\Components\Textarea::make('purpose')
                            ->label('Keperluan')
                            ->readOnly()
                            ->columnSpanFull(),
                    ])->columns(2),

                // Section 2: Dokumen
                Forms\Components\Section::make('Dokumen Persyaratan')
                    ->description('File yang diunggah pemohon. Klik link untuk melihat.')
                    ->schema([
                        Forms\Components\Repeater::make('documents')
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('document_type')
                                    ->label('Jenis Dokumen')
                                    ->readOnly(),
                                
                                // Custom View Field untuk Link Download
                                Forms\Components\ViewField::make('file_preview')
                                    ->view('filament.components.document-link') 
                                    ->label('File')
                                    ->columnSpan(1),
                            ])
                            ->addable(false)
                            ->deletable(false)
                            ->reorderable(false)
                            ->grid(2)
                            ->columnSpanFull()
                    ])
            ]);
    }

    // --- TABLE (Daftar Data di Dashboard) ---
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom 1: Token
                Tables\Columns\TextColumn::make('ticket_token')
                    ->label('Token')
                    ->searchable()
                    ->copyable()
                    ->weight('bold')
                    ->color('primary'),

                // Kolom 2: Tanggal
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tgl Masuk')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                // Kolom 3: Nama
                Tables\Columns\TextColumn::make('applicant_name')
                    ->label('Pemohon')
                    ->searchable(),

                // Kolom 4: Layanan
                Tables\Columns\TextColumn::make('service.name')
                    ->label('Layanan')
                    ->badge()
                    ->color('gray'),

                // Kolom 5: Status (Badge Warna)
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',   // Kuning
                        'approved' => 'success',  // Hijau
                        'rejected' => 'danger',   // Merah
                        'completed' => 'info',    // Biru
                        default => 'gray',
                    }),
            ])
            ->defaultSort('created_at', 'desc') // Urutkan dari yang terbaru
            ->actions([
                // ACTION GROUP (Dropdown Menu agar rapi)
                ActionGroup::make([
                    
                    // 1. View Action (Lihat Detail)
                    ViewAction::make()
                        ->label('Lihat Detail')
                        ->color('info'),

                    // 2. Approve Action (ACC)
                    Action::make('approve')
                        ->label('Setujui (ACC)')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        // Konfirmasi Modal
                        ->requiresConfirmation()
                        ->modalHeading('Setujui Pengajuan?')
                        ->modalDescription('Sistem akan membuat Tiket Antrian secara otomatis untuk pemohon ini.')
                        ->modalSubmitActionLabel('Ya, Setujui')
                        // Hanya muncul jika status PENDING
                        ->visible(fn (Application $record) => $record->status === 'pending')
                        ->action(function (Application $record) {
                            
                            // --- LOGIKA TRANSAKSI ---
                            DB::transaction(function () use ($record) {
                                
                                // A. Hitung Nomor Antrian (A-001)
                                $todayCount = QueueTicket::whereDate('created_at', today())->count();
                                $queueNumber = 'A-' . str_pad($todayCount + 1, 3, '0', STR_PAD_LEFT);

                                // B. Buat Tiket di DB
                                QueueTicket::create([
                                    'application_id' => $record->id,
                                    'queue_number' => $queueNumber,
                                    'service_date' => now()->addDay(), // Default besok
                                    'estimated_time' => '08:00',       // Default jam 8
                                    'location' => 'Loket A',
                                    'status' => 'waiting'
                                ]);

                                // C. Update Status Aplikasi
                                $record->update([
                                    'status' => 'approved',
                                    'approved_by' => Auth::id(),
                                    'approved_at' => now(),
                                ]);
                            });

                            Notification::make()
                                ->title('Berhasil')
                                ->body('Pengajuan disetujui. Tiket antrian telah dibuat.')
                                ->success()
                                ->send();
                        }),

                    // 3. Reject Action (Tolak)
                    Action::make('reject')
                        ->label('Tolak Pengajuan')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        // Modal Form Alasan
                        ->form([
                            Forms\Components\Textarea::make('rejection_note')
                                ->label('Alasan Penolakan')
                                ->placeholder('Contoh: Dokumen KTP buram / tidak terbaca.')
                                ->required()
                        ])
                        ->modalHeading('Tolak Pengajuan')
                        ->modalSubmitActionLabel('Kirim Penolakan')
                        // Hanya muncul jika status PENDING
                        ->visible(fn (Application $record) => $record->status === 'pending')
                        ->action(function (Application $record, array $data) {
                            
                            $record->update([
                                'status' => 'rejected',
                                'rejection_note' => $data['rejection_note'],
                                'approved_by' => Auth::id(),
                            ]);

                            Notification::make()
                                ->title('Pengajuan Ditolak')
                                ->danger()
                                ->send();
                        }),

                ])
                ->label('Aksi')
                ->icon('heroicon-m-ellipsis-vertical')
                ->color('primary')
                ->button() // Tampilkan sebagai tombol
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplications::route('/'),
            // Kita disable create & edit karena flow ini dari user form
        ];
    }

    // Matikan tombol "New Application" di dashboard
    public static function canCreate(): bool
    {
        return false;
    }
}
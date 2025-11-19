<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Application;
use App\Models\ApplicationDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    // 1. Tampilkan Halaman Pilih Layanan
    public function showServiceSelection(Request $request)
    {
        $serviceId = $request->query('serviceId', 'informasi');
        
        // Judul Header dinamis
        $titles = [
            'klasifikasi' => 'Pilih Pengguna - Klasifikasi Barang',
            'fasilitas' => 'Pilih Pengguna - Fasilitas Pembebasan',
            'pengaduan' => 'Pilih Pengguna - Pengaduan',
            'informasi' => 'Pilih Pengguna - Informasi Kepabeanan',
        ];

        return view('layanan', [
            'title' => $titles[$serviceId] ?? 'Pilih Layanan',
            'activeNav' => 'layanan',
            'serviceId' => $serviceId, 
        ]);
    }

    // 2. Tampilkan Formulir
    public function showForm(Request $request)
    {
        return view('form', [
            'title' => 'Isi Data & Dokumen - DJBC',
            'activeNav' => 'layanan',
        ]);
    }

    // 3. PROSES REVIEW (Validasi & Upload Sementara)
    public function processReview(Request $request)
    {
        // A. Validasi Input
        $validated = $request->validate([
            'fullName' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'question' => 'required',
            'user_type' => 'required',
            'service_id' => 'required',
            // Validasi file (wajib ada jika required di form)
            'file_idCard' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'file_skb' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            // ... tambahkan validasi file lain
        ]);

        // B. Upload File ke folder 'temp' agar bisa ditampilkan di halaman review
        $uploadedFiles = [];
        $fileInputs = ['file_idCard', 'file_skb', 'file_suratTugas', 'file_suratKuasa', 'file_ktpPaspor', 'file_idCardInstansi', 'file_suratTugasLembaga', 'file_idCardFirma', 'file_kartuAdvokat', 'file_suratKuasaFirma'];

        foreach ($fileInputs as $input) {
            if ($request->hasFile($input)) {
                // Simpan sementara di folder public/temp
                $path = $request->file($input)->store('temp', 'public');
                $uploadedFiles[$input] = [
                    'path' => $path,
                    'original_name' => $request->file($input)->getClientOriginalName()
                ];
            }
        }

        // C. Tampilkan Halaman Review dengan Data
        return view('review', [
            'title' => 'Review Pengajuan',
            'activeNav' => 'layanan',
            'data' => $request->except(['_token', ...$fileInputs]), // Data teks
            'files' => $uploadedFiles, // Data path file
        ]);
    }

    // 4. SUBMIT FINAL (Simpan ke Database)
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // A. Ambil Service
            $service = Service::where('slug', $request->service_id)->firstOrFail();

            // B. Buat Application
            $app = Application::create([
                'service_id' => $service->id,
                'ticket_token' => 'REG-' . strtoupper(Str::random(6)) . date('d'),
                'applicant_name' => $request->fullName,
                'applicant_email' => $request->email,
                'applicant_phone' => $request->phone,
                'applicant_category' => $request->user_type,
                'purpose' => $request->question,
                'status' => 'pending',
            ]);

            // C. Pindahkan File dari Temp ke Final & Simpan ke DB
            // Kita ambil data path file dari hidden input di halaman review
            if ($request->has('files')) {
                foreach ($request->input('files') as $key => $fileData) {
                    // $fileData string JSON decode jika perlu, atau array
                    // Asumsi form mengirim array: files[file_idCard][path]
                    
                    $tempPath = $fileData['path'];
                    $originalName = $fileData['original_name'];
                    
                    // Pindahkan file dari 'temp' ke 'documents/tanggal'
                    $newPath = 'documents/' . date('Y-m-d') . '/' . basename($tempPath);
                    
                    if (Storage::disk('public')->exists($tempPath)) {
                        Storage::disk('public')->move($tempPath, $newPath);
                        
                        // Mapping Nama Dokumen agar rapi di database
                        $docLabel = ucwords(str_replace(['file_', '_'], ['',' '], $key));

                        ApplicationDocument::create([
                            'application_id' => $app->id,
                            'document_type' => $docLabel,
                            'file_path' => $newPath,
                            'original_name' => $originalName,
                        ]);
                    }
                }
            }

            DB::commit();

            // Redirect ke Status Antrian
            return redirect()->route('antrian.status', ['token' => $app->ticket_token]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // 5. Cek Status Antrian
    public function checkStatus(Request $request)
    {
        $application = Application::where('ticket_token', $request->token)->with('queueTicket')->firstOrFail();
        
        return view('antrian', [
            'title' => 'Status Pengajuan',
            'activeNav' => 'antrian',
            'printArea' => true,
            'noPrint' => true,
            'data' => $application, // Kirim objek application ke view
        ]);
    }
}
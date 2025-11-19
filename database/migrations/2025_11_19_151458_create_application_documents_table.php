<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_application_documents_table.php
    public function up()
    {
        Schema::create('application_documents', function (Blueprint $table) {
            $table->id();
            // Relasi ke Aplikasi
            $table->foreignId('application_id')->constrained('applications')->onDelete('cascade');

            $table->string('document_type'); // Label dokumen (misal: 'ID Card', 'SKB')
            $table->string('file_path');     // Lokasi file di storage
            $table->string('original_name'); // Nama asli file upload user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_documents');
    }
};

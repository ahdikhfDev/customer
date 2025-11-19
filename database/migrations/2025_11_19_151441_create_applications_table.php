<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_applications_table.php
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            // Relasi ke Service
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');

            // Data Pemohon (Sesuai input form)
            $table->string('ticket_token')->unique(); // Kode unik buat tracking (misal: REG-X7Y2)
            $table->string('applicant_name');     // Input: fullName
            $table->string('applicant_email');    // Input: email
            $table->string('applicant_phone');    // Input: phone
            $table->string('applicant_category'); // Input: user_type (perusahaan/pemerintah/dll)
            $table->text('purpose');              // Input: question

            // Status Workflow
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');

            // Audit Trail Sederhana (Siapa admin yang ACC)
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->timestamp('approved_at')->nullable();
            $table->text('rejection_note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

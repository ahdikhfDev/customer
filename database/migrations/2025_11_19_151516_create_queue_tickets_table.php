<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_queue_tickets_table.php
    public function up()
    {
        Schema::create('queue_tickets', function (Blueprint $table) {
            $table->id();
            // Relasi One-to-One dengan Application
            $table->foreignId('application_id')->constrained('applications')->onDelete('cascade');

            $table->string('queue_number'); // A-001
            $table->date('service_date');   // Tanggal kedatangan
            $table->time('estimated_time'); // Jam
            $table->string('location');     // Loket A

            $table->enum('status', ['waiting', 'served', 'skipped'])->default('waiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queue_tickets');
    }
};

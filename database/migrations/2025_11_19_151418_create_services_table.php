<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_services_table.php
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // 'klasifikasi', 'fasilitas', dll
            $table->string('name'); // 'Klasifikasi Barang'
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

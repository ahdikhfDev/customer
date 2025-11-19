<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run()
    {
        $services = [
            ['slug' => 'klasifikasi', 'name' => 'Klasifikasi Barang', 'description' => 'Layanan penentuan kode HS barang.'],
            ['slug' => 'fasilitas', 'name' => 'Fasilitas Pembebasan', 'description' => 'Layanan fasilitas fiskal.'],
            ['slug' => 'pengaduan', 'name' => 'Pengaduan', 'description' => 'Layanan pengaduan masyarakat.'],
            ['slug' => 'informasi', 'name' => 'Informasi Kepabeanan', 'description' => 'Layanan informasi umum.'],
        ];

        foreach ($services as $s) {
            Service::create($s);
        }
    }
}

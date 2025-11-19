<?php

// app/Models/Application.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    // Relasi ke Service (Master Data)
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Relasi ke Dokumen (One to Many)
    public function documents()
    {
        return $this->hasMany(ApplicationDocument::class);
    }

    // Relasi ke Tiket Antrian (One to One - Hanya ada jika approved)
    public function queueTicket()
    {
        return $this->hasOne(QueueTicket::class);
    }

    // Relasi ke User (Admin yang menyetujui)
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
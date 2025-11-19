<?php

// app/Models/ApplicationDocument.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ApplicationDocument extends Model
{
    protected $guarded = [];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    // Accessor untuk mendapatkan full URL file
    public function getFileUrlAttribute()
    {
        return Storage::url($this->file_path);
    }
}   
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = []; // Mass assignment allowed

    // Relasi: Satu layanan bisa memiliki banyak pengajuan
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}

<?php

// app/Models/QueueTicket.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueueTicket extends Model
{
    protected $guarded = [];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
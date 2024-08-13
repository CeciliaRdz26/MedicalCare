<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajeChat extends Model
{
    use HasFactory;

    // Relación con Cita
    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

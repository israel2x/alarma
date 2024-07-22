<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto',
        'longitud',
        'latitud',
        'fecha_incidente',
        'estado_atendido',
    ];



    public function usuarios()
    {
        return $this->belongsTo(User::class);
    }
}

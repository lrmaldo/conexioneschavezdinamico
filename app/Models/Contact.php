<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

    protected $fillable = [
        'telefono1',
        'telefono2',
        'correo',
        'direccion',
        'facebook',
        'instagram',
        'whatsapp',
    ];
}

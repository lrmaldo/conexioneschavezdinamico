<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //

    protected $fillable = [
        'nombre',
        'descripcion',
        'icono',
        'logo',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

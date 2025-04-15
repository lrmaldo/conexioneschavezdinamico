<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'nombre',
        'descripcion',
        'icono',
        'imagen',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

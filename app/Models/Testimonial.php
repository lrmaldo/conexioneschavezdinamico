<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //

    protected $fillable = [
        'cliente',
        'empresa',
        'mensaje',
        'imagen',

    ];
    public function images()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }
}

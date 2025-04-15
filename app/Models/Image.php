<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'url',
        'imageable',
    ];
    public function images()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageable');
    }
}

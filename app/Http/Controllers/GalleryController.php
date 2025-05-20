<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;
class GalleryController extends Controller
{
    //
    public function index()
    {
        $galleryImages = GalleryImage::all();
        return view('gallery.index', compact('galleryImages'));

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    //
    public function index()
    {
        return view('testimonials.index');
    }
    public function show(Testimonial $testimonial)
    {


        return view('testimonials.show', compact('testimonial'));
    }
}

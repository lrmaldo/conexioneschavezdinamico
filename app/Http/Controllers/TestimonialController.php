<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    //
    public function index()
    {
        $companyStats = [
            'experience' => 11, // Años de experiencia
            'clients' => 1000,  // Clientes satisfechos
            'projects' => 5000, // Proyectos completados
            'service' => '24h',  // Servicio de emergencia
        ];
        $testimonials = Testimonial::all();
        return view('testimonials.index', compact('testimonials', 'companyStats'));

    }
    public function show(Testimonial $testimonial)
    {
        $companyStats = [
            'experience' => 11, // Años de experiencia
            'clients' => 1000,  // Clientes satisfechos
            'projects' => 5000, // Proyectos completados
            'service' => '24h',  // Servicio de emergencia
        ];
        $testimonial = Testimonial::findOrFail($testimonial->id);
       /*  $testimonial->increment('views'); // Incrementar el contador de vistas
        $testimonial->save(); */

        return view('testimonials.show', compact('testimonial', 'companyStats'));
    }
}

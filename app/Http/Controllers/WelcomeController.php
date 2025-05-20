<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Schedule;
use App\Models\GalleryImage;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('tipo', 'producto')->take(4)->get();
        $featuredProducts = Product::take(4)->get();
        $providers = Provider::take(4)->get();
        $testimonials = Testimonial::take(3)->get();
        $contact = Contact::first();
        $schedule = Schedule::first();
        $galleryImages = GalleryImage::take(4)->get();
        $companyStats = [
            'experience' => 11, // Años de experiencia
            'clients' => 1000,  // Clientes satisfechos
            'projects' => 5000, // Proyectos completados
            'service' => '24h',  // Servicio de emergencia
        ];

        return view('welcome', compact(
            'categories',
            'featuredProducts',
            'providers',
            'testimonials',
            'contact',
            'schedule',
            'companyStats',
            'galleryImages'
        ));
    }
}

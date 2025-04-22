<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //index, show
    public function index()
    {
        $companyStats = [
            'experience' => 11, // Años de experiencia
            'clients' => 1000,  // Clientes satisfechos
            'projects' => 5000, // Proyectos completados
            'service' => '24h',  // Servicio de emergencia
        ];
        $products = Product::all();
        return view('products.index');
    }
    public function show(Product $product){
        $companyStats = [
            'experience' => 11, // Años de experiencia
            'clients' => 1000,  // Clientes satisfechos
            'projects' => 5000, // Proyectos completados
            'service' => '24h',  // Servicio de emergencia
        ];

        return view('products.show', compact('product', 'companyStats'));
    }
}

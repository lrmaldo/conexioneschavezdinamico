<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Category;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Muestra la lista de proveedores
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companyStats = [
            'experience' => 11, // Años de experiencia
            'clients' => 1000,  // Clientes satisfechos
            'projects' => 5000, // Proyectos completados
            'service' => '24h',  // Servicio de emergencia
        ];
        $providers = Provider::all();

        return view('providers.index', compact('providers', 'companyStats'));
    }


    /**
     * Muestra los detalles de un proveedor específico
     *
     * @param Provider $provider
     * @return \Illuminate\View\View
     */
    public function show(Provider $provider)
    {
        return view('providers.show', compact('provider'));
    }
}

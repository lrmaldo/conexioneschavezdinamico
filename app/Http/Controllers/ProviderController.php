<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    //
    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }
    public function show(Provider $provider)
    {


        return view('providers.show', compact('provider'));
    }
}

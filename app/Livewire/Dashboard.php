<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),
            'totalSuppliers' => Provider::count(),
            'recentProducts' => Product::latest()->take(5)->get(),
        ]);

    }
}

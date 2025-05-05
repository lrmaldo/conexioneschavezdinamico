<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;

class ProductSearch1 extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $perPage = 12;

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
    ];

    // Esta función se ejecuta cuando cambia el valor de search
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Esta función se ejecuta cuando cambia el valor de category
    public function updatedCategory()
    {
        $this->resetPage();
    }

    // Método para reiniciar todos los filtros
    public function resetFilters()
    {
        $this->reset(['search', 'category']);
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::orderBy('nombre')->get();

        $products = Product::query()
            ->when($this->search, function($query) {
                return $query->where(function($q) {
                    $q->where('nombre', 'like', '%' . $this->search . '%')
                      ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                      ->orWhere('codigo', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->category, function($query) {
                return $query->where('category_id', $this->category);
            })
            ->with('category')
            ->orderBy('nombre')
            ->paginate($this->perPage);
        return view('livewire.product-search1',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}

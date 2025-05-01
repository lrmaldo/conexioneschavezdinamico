<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Provider;
use App\Models\Category;

class ProviderTable extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategory = '';
    protected $queryString = ['search', 'selectedCategory'];

    // Reiniciar paginación cuando cambian los filtros
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::all();

        $providers = Provider::query()
            ->when($this->search, function($query) {
                return $query->where('nombre', 'like', '%'.$this->search.'%')
                      ->orWhere('descripcion', 'like', '%'.$this->search.'%');
            })
            ->when($this->selectedCategory, function($query) {
                return $query->where('category_id', $this->selectedCategory);
            })
            ->with('category')
            ->paginate(8);

        return view('livewire.provider-table', [
            'providers' => $providers,
            'categories' => $categories,
        ]);
    }
}

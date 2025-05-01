<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Testimonial;

class TestimonialTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    // Número de elementos por página
    public $perPage = 6;

    // Para recordar la página actual durante interacciones
    protected $queryString = ['page' => ['except' => 1]];

    public function render()
    {
        $testimonials = Testimonial::latest()->paginate($this->perPage);
        return view('livewire.testimonial-table', [
            'testimonials' => $testimonials
        ]);
    }

    // Restablecer la paginación cuando se cambia algún filtro
    public function resetFilters()
    {
        $this->resetPage();
    }
}

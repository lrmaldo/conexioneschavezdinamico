<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryCrud extends Component
{
    // Propiedades para datos del formulario
    public $category_id;
    public $nombre;
    public $tipo;
    public $descripcion;
    public $activo = true;

    // Estado del modal
    public $isOpen = false;

    // Reglas de validación
    protected $rules = [
        'nombre' => 'required|string|max:255',
        'tipo' => 'required|in:producto,proveedor',
        'descripcion' => 'nullable|string',
        'activo' => 'boolean',
    ];

    // Definir los cast para asegurar que los valores se manejen correctamente
    protected $casts = [
        'activo' => 'boolean',
    ];

    public function render()
    {
        $categories = Category::orderBy('nombre')->get();
        return view('livewire.category-crud', compact('categories'));
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetInput()
    {
        $this->category_id = null;
        $this->nombre = '';
        $this->tipo = '';
        $this->descripcion = '';
        $this->activo = true;
    }

    public function store()
    {
        $this->validate();
        #dd($this->activo);;
        Category::updateOrCreate(['id' => $this->category_id], [
            'nombre' => $this->nombre,
            'tipo' => $this->tipo,
            'descripcion' => $this->descripcion,
            'activo' => $this->activo? true : false,
        ]);

        session()->flash('message', $this->category_id ? 'Categoría actualizada correctamente.' : 'Categoría creada correctamente.');

        $this->closeModal();
        $this->resetInput();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->nombre = $category->nombre;
        $this->tipo = $category->tipo;
        $this->descripcion = $category->descripcion;
        // Forzar conversión a booleano
        $this->activo = (bool) $category->activo;

        $this->openModal();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Categoría eliminada correctamente.');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ProductosCrud extends Component
{
    use WithFileUploads, WithPagination;

    public $isOpen = false;
    public $product_id, $nombre, $descripcion, $icono, $imagen, $category_id;
    public $imagenes = [];
    public $editing = false;
    public $productImages = []; // Nueva propiedad para almacenar las imágenes del producto

    // Variables para búsqueda y filtrado
    public $search = '';
    public $categoryFilter = '';
    public $perPage = 8;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $listeners = ['delete'];
    protected $queryString = ['search', 'categoryFilter', 'sortField', 'sortDirection'];
    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'nombre' => 'required|min:3',
        'descripcion' => 'required',
        'category_id' => 'required|exists:categories,id',
        'icono' => 'nullable|image|max:1024',
        'imagen' => 'nullable|image|max:1024',
        'imagenes.*' => 'nullable|image|max:1024',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategoryFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categorias = Category::where('tipo', 'producto')->get();

        $productos = Product::with('category', 'images')
            ->when($this->search, function($query, $search) {
                return $query->where('nombre', 'like', '%'.$search.'%')
                    ->orWhere('descripcion', 'like', '%'.$search.'%');
            })
            ->when($this->categoryFilter, function($query, $categoryFilter) {
                return $query->where('category_id', $categoryFilter);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.productos-crud', compact('productos', 'categorias'));
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function openModal()
    {
        $this->isOpen = true;
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->product_id = null;
        $this->nombre = '';
        $this->descripcion = '';
        $this->icono = null;
        $this->imagen = null;
        $this->category_id = '';
        $this->imagenes = [];
        $this->editing = false;
    }

    public function store()
    {
        $this->validate();

        // Preparar datos para guardar
        $data = [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'category_id' => $this->category_id,
        ];

        // Manejar icono
        if ($this->icono && !is_string($this->icono)) {
            if ($this->editing && $this->product_id) {
                $producto = Product::find($this->product_id);
                if ($producto->icono) {
                    Storage::delete('public/' . $producto->icono);
                }
            }
            $iconoPath = $this->icono->store('productos/iconos', 'public');
            $data['icono'] = $iconoPath;
        }

        // Manejar imagen principal
        if ($this->imagen && !is_string($this->imagen)) {
            if ($this->editing && $this->product_id) {
                $producto = Product::find($this->product_id);
                if ($producto->imagen) {
                    Storage::delete('public/' . $producto->imagen);
                }
            }
            $imagenPath = $this->imagen->store('productos/imagenes', 'public');
            $data['imagen'] = $imagenPath;
        }

        // Crear o actualizar producto
        $producto = Product::updateOrCreate(['id' => $this->product_id], $data);

        // Guardar imágenes adicionales
        if (!empty($this->imagenes)) {
            foreach ($this->imagenes as $imagen) {
                $imagenPath = $imagen->store('productos/galeria', 'public');
                $producto->images()->create([
                    'url' => $imagenPath
                ]);
            }
        }

        // Mensaje de éxito
        session()->flash('message', $this->product_id ? 'Producto actualizado correctamente.' : 'Producto creado correctamente.');

        $this->closeModal();
        $this->resetInput();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->nombre = $product->nombre;
        $this->descripcion = $product->descripcion;
        $this->icono = $product->icono;
        $this->imagen = $product->imagen;
        $this->category_id = $product->category_id;
        $this->editing = true;
        $this->productImages = $product->images; // Cargar las imágenes del producto

        $this->openModal();
    }

    public function delete($id)
    {
        $product = Product::find($id);

        // Eliminar imágenes asociadas
        foreach ($product->images as $image) {
            Storage::delete('public/' . $image->url);
            $image->delete();
        }

        // Eliminar imágenes principales
        if ($product->imagen) {
            Storage::delete('public/' . $product->imagen);
        }
        if ($product->icono) {
            Storage::delete('public/' . $product->icono);
        }

        $product->delete();
        session()->flash('message', 'Producto eliminado correctamente.');
    }

    public function deleteImage($id)
    {
        $image = Image::find($id);
        if ($image) {
            Storage::delete('public/' . $image->url);
            $image->delete();
        }
        session()->flash('message', 'Imagen eliminada correctamente.');
    }
}

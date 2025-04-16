<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Provider;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProviderCrud extends Component
{
    use WithPagination;
    use WithFileUploads;

    // Propiedades para el formulario
    public $provider_id, $nombre, $descripcion, $icono, $logo, $category_id;

    // Propiedades para archivos
    public $iconoFile, $logoFile;

    // Propiedades para búsqueda y modal
    public $search = '';
    public $isOpen = false;

    // Propiedades para el modo de vista
    public $viewMode = 'cards';

    // Listeners
    protected $listeners = ['delete'];

    // Modificar esta propiedad para hacerla reactiva
    protected $queryString = ['search'];

    // Modificar el tiempo de debounce
    protected $updatesQueryString = ['search'];

    // Agregar esta propiedad para mantener activada la actualización en tiempo real
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Reglas de validación
    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'iconoFile' => $this->provider_id ? 'nullable|image|max:1024' : 'nullable|image|max:1024',
            'logoFile' => $this->provider_id ? 'nullable|image|max:1024' : 'nullable|image|max:1024',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function render()
    {
        $search = trim($this->search);
        $searchTerm = $search ? '%' . $search . '%' : '';

        $query = Provider::query();

        if ($search) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('nombre', 'LIKE', $searchTerm)
                  ->orWhere('descripcion', 'LIKE', $searchTerm)
                  ->orWhereHas('category', function($q) use ($searchTerm) {
                      $q->where('nombre', 'LIKE', $searchTerm);
                  });
            });
        }

        $providers = $query->orderBy('id', 'desc')->paginate(10);

        return view('livewire.provider-crud', [
            'providers' => $providers,
            'categories' => Category::where('activo', 1)->where('tipo', 'proveedor')->get(),
        ]);
    }

    // Método para limpiar la búsqueda
    public function resetSearch()
    {
        $this->search = '';
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetInput()
    {
        $this->provider_id = null;
        $this->nombre = '';
        $this->descripcion = '';
        $this->icono = '';
        $this->logo = '';
        $this->category_id = '';
        $this->iconoFile = null;
        $this->logoFile = null;
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        $iconoPath = $this->icono;
        $logoPath = $this->logo;

        // Procesar icono si se ha subido uno nuevo
        if ($this->iconoFile) {
            // Eliminar archivo anterior si existe
            if ($this->provider_id && $this->icono) {
                Storage::delete('public/' . $this->icono);
            }
            $iconoPath = $this->iconoFile->store('providers/icons', 'public');
        }

        // Procesar logo si se ha subido uno nuevo
        if ($this->logoFile) {
            // Eliminar archivo anterior si existe
            if ($this->provider_id && $this->logo) {
                Storage::delete('public/' . $this->logo);
            }
            $logoPath = $this->logoFile->store('providers/logos', 'public');
        }

        Provider::updateOrCreate(['id' => $this->provider_id], [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'icono' => $iconoPath,
            'logo' => $logoPath,
            'category_id' => $this->category_id
        ]);

        session()->flash('message', $this->provider_id ? 'Proveedor actualizado correctamente.' : 'Proveedor creado correctamente.');

        $this->closeModal();
        $this->resetInput();
    }

    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        $this->provider_id = $id;
        $this->nombre = $provider->nombre;
        $this->descripcion = $provider->descripcion;
        $this->icono = $provider->icono;
        $this->logo = $provider->logo;
        $this->category_id = $provider->category_id;

        $this->openModal();
    }

    public function delete($id)
    {
        $provider = Provider::find($id);

        // Eliminar archivos asociados
        if ($provider->icono) {
            Storage::delete('public/' . $provider->icono);
        }

        if ($provider->logo) {
            Storage::delete('public/' . $provider->logo);
        }

        $provider->delete();
        session()->flash('message', 'Proveedor eliminado correctamente.');
    }

    // Agrega este método para alternar entre modos de vista
    public function toggleViewMode()
    {
        $this->viewMode = $this->viewMode === 'cards' ? 'table' : 'cards';
    }
}

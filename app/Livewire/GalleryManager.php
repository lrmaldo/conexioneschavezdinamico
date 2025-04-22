<?php

namespace App\Livewire;

use App\Models\GalleryImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class GalleryManager extends Component
{
    use WithFileUploads, WithPagination;

    public $titulo, $descripcion, $categoria, $imagen;
    public $gallery_image_id;
    public $url;
    public $isOpen = false;
    public $isEdit = false;

    // Nueva propiedad para filtrar por categoría
    public $categoriaFiltro = '';

    // Propiedades para seleccionar múltiples imágenes
    public $selected = [];
    public $selectAll = false;
    public $bulkDisabled = true;

    // Propiedades para manejar confirmaciones modales
    public $confirmingDelete = false;
    public $confirmingBulkDelete = false;
    public $deletingImageId = null;

    // Escuchar eventos de Livewire
    protected $listeners = ['confirmDeleteSelected'];

    public function render()
    {
        // Filtrar imágenes según la categoría seleccionada
        $imagesQuery = GalleryImage::latest();

        if ($this->categoriaFiltro) {
            $imagesQuery->where('categoria', $this->categoriaFiltro);
        }

        $images = $imagesQuery->paginate(12);

        // Verificar si hay imágenes seleccionadas para habilitar/deshabilitar botones
        $this->bulkDisabled = count($this->selected) === 0;

        return view('livewire.gallery-manager', compact('images'));
    }

    // Métodos para seleccionar/deseleccionar imágenes
    public function updatedSelectAll($value)
    {
        if ($value) {
            // Si se selecciona "todos", obtener todos los IDs de la consulta actual
            $imagesQuery = GalleryImage::latest();
            if ($this->categoriaFiltro) {
                $imagesQuery->where('categoria', $this->categoriaFiltro);
            }
            $this->selected = $imagesQuery->pluck('id')->map(fn($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    // Método para forzar la actualización de la UI cuando se actualiza el array selected
    public function updatedSelected()
    {
        // Si tenemos todas las imágenes seleccionadas, marcar selectAll como true
        $imagesQuery = GalleryImage::latest();
        if ($this->categoriaFiltro) {
            $imagesQuery->where('categoria', $this->categoriaFiltro);
        }
        $imagesCount = $imagesQuery->count();

        // Actualizar selectAll basado en si todas las imágenes están seleccionadas
        $this->selectAll = count($this->selected) === $imagesCount && $imagesCount > 0;
    }

    public function deseleccionarTodas()
    {
        $this->selected = [];
        $this->selectAll = false;
    }

    // Método para confirmar eliminación múltiple
    public function confirmDeleteSelected()
    {
        if (count($this->selected) > 0) {
            $cantidad = count($this->selected);
            $images = GalleryImage::whereIn('id', $this->selected)->get();

            try {
                foreach ($images as $image) {
                    // Eliminar el archivo de imagen del almacenamiento
                    if ($image->url) {
                        Storage::disk('public')->delete(str_replace('/storage/', '', $image->url));
                    }
                    // Eliminar el registro
                    $image->delete();
                }

                session()->flash('message', '¡' . $cantidad . ' imágenes eliminadas correctamente!');
            } catch (\Exception $e) {
                session()->flash('message', 'Error al eliminar imágenes: ' . $e->getMessage());
            }

            // Limpiar selecciones
            $this->selected = [];
            $this->selectAll = false;
        }
    }

    // Método para prompt de confirmación antes de eliminar
    public function deleteSelected()
    {
        if (count($this->selected) === 0) {
            session()->flash('message', 'No hay imágenes seleccionadas para eliminar.');
            return;
        }

        // Mostrar modal de confirmación para eliminación masiva
        $this->confirmingBulkDelete = true;
    }

    // Método para cancelar eliminación masiva
    public function cancelBulkDelete()
    {
        $this->confirmingBulkDelete = false;
    }

    // Método para mostrar confirmación de eliminación individual
    public function confirmDelete($id)
    {
        $this->deletingImageId = $id;
        $this->confirmingDelete = true;
    }

    // Método para cancelar eliminación individual
    public function cancelDelete()
    {
        $this->confirmingDelete = false;
        $this->deletingImageId = null;
    }

    // Método para ejecutar eliminación individual (solo después de confirmación)
    public function delete()
    {
        if ($this->deletingImageId) {
            $image = GalleryImage::find($this->deletingImageId);

            if ($image) {
                // Eliminar la imagen del almacenamiento
                if ($image->url) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $image->url));
                }

                // Eliminar el registro
                $image->delete();
                session()->flash('message', '¡Imagen eliminada correctamente!');
            }

            // Resetear estado
            $this->confirmingDelete = false;
            $this->deletingImageId = null;
        }
    }

    // Nuevo método para cambiar el filtro de categoría
    public function filtrarPorCategoria($categoria = '')
    {
        $this->categoriaFiltro = $categoria;
        $this->resetPage(); // Reiniciar paginación al cambiar filtros
        $this->selected = []; // Limpiar selección al cambiar filtros
        $this->selectAll = false;
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
        $this->gallery_image_id = null;
        $this->titulo = '';
        $this->descripcion = '';
        $this->categoria = '';
        $this->imagen = null;
        $this->url = '';
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'categoria' => 'required|in:empresa,servicios,local,evento',
            'imagen' => $this->isEdit ? 'nullable' : 'required',
            'imagen.*' => 'image|max:2048',
        ]);

        $data = [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'categoria' => $this->categoria,
        ];

        // Si estamos editando y hay una imagen nueva
        if ($this->isEdit) {
            // Si hay imágenes nuevas y existe una imagen anterior, eliminarla
            if ($this->imagen && $this->url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $this->url));
            }

            // Guardamos la primera imagen nueva (si existe)
            if ($this->imagen) {
                if (is_array($this->imagen)) {
                    $path = $this->imagen[0]->store('gallery', 'public');
                } else {
                    $path = $this->imagen->store('gallery', 'public');
                }
                $data['url'] = '/storage/' . $path;
            }

            GalleryImage::find($this->gallery_image_id)->update($data);
            session()->flash('message', '¡Imagen actualizada correctamente!');
        }
        // Si estamos creando nuevas imágenes
        else {
            // Determinar si tenemos una o múltiples imágenes
            if (is_array($this->imagen)) {
                // Crear múltiples registros
                foreach ($this->imagen as $img) {
                    $path = $img->store('gallery', 'public');
                    $imageData = $data;
                    $imageData['url'] = '/storage/' . $path;
                    GalleryImage::create($imageData);
                }
                session()->flash('message', '¡' . count($this->imagen) . ' imágenes agregadas correctamente!');
            } else {
                // Crear un solo registro
                $path = $this->imagen->store('gallery', 'public');
                $data['url'] = '/storage/' . $path;
                GalleryImage::create($data);
                session()->flash('message', '¡Imagen agregada correctamente!');
            }
        }

        $this->closeModal();
    }

    public function edit($id)
    {
        $image = GalleryImage::findOrFail($id);
        $this->gallery_image_id = $id;
        $this->titulo = $image->titulo;
        $this->descripcion = $image->descripcion;
        $this->categoria = $image->categoria;
        $this->url = $image->url;
        $this->isEdit = true;

        $this->openModal();
    }

    // Renombrado de método original para evitar duplicación
    public function deleteImage($id)
    {
        $image = GalleryImage::find($id);

        if ($image) {
            // Eliminar la imagen del almacenamiento
            if ($image->url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $image->url));
            }

            // Eliminar el registro
            $image->delete();
            session()->flash('message', '¡Imagen eliminada correctamente!');
        }
    }

    // Implementar un hook para detectar cambios en la selección
    public function updated($name, $value)
    {
        // Si la propiedad que cambió está relacionada con la selección
        if ($name === 'selected' || $name === 'selected.*') {
            // Asegurarse de que selectAll refleje el estado actual
            $imagesQuery = GalleryImage::latest();
            if ($this->categoriaFiltro) {
                $imagesQuery->where('categoria', $this->categoriaFiltro);
            }
            $imagesCount = $imagesQuery->count();

            // Actualizar selectAll si todas las imágenes están seleccionadas
            $this->selectAll = count($this->selected) === $imagesCount && $imagesCount > 0;
        }
    }
}

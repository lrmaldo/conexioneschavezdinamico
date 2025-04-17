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

    public function render()
    {
        $images = GalleryImage::latest()->paginate(12);
        return view('livewire.gallery-manager', compact('images'));
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
            'imagen' => $this->isEdit ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ]);

        $data = [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'categoria' => $this->categoria,
        ];

        if ($this->imagen) {
            // Si existe una imagen anterior y estamos editando, la eliminamos
            if ($this->isEdit && $this->url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $this->url));
            }

            // Guardamos la nueva imagen
            $path = $this->imagen->store('gallery', 'public');
            $data['url'] = '/storage/' . $path;
        }

        if ($this->isEdit) {
            GalleryImage::find($this->gallery_image_id)->update($data);
            session()->flash('message', '¡Imagen actualizada correctamente!');
        } else {
            GalleryImage::create($data);
            session()->flash('message', '¡Imagen agregada correctamente!');
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

    public function delete($id)
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
}

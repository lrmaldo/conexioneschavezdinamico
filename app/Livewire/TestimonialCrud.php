<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Testimonial;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class TestimonialCrud extends Component
{
    use WithPagination;
    use WithFileUploads;

    // Propiedades para el formulario
    public $testimonial_id, $cliente, $empresa, $mensaje, $cargo, $imagen;

    // Propiedad para archivo principal
    public $imageFile;

    // Propiedad para imágenes adicionales
    public $additionalImages = [];

    // Propiedades para búsqueda y modal
    public $search = '';
    public $isOpen = false;

    // Listeners para eventos
    protected $listeners = ['delete'];

    // Propiedades reactivas
    protected $queryString = ['search'];

    // Reglas de validación
    protected function rules()
    {
        return [
            'cliente' => 'required|string|max:255',
            'empresa' => 'nullable|string|max:255',
            'mensaje' => 'required|string',
            'cargo' => 'nullable|string|max:255',
            'imageFile' => $this->testimonial_id ? 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif,webp,svg,bmp' : 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif,webp,svg,bmp',
            'additionalImages.*' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif,webp,svg,bmp',
        ];
    }

    // Mensajes de validación personalizados
    protected $messages = [
        'mensaje.required' => 'El testimonio es obligatorio.',
        'cliente.required' => 'El nombre del cliente es obligatorio.',
        'imageFile.image' => 'El archivo debe ser una imagen válida.',
        'imageFile.mimes' => 'La imagen debe ser de formato: jpg, jpeg, png, gif, webp, svg, bmp.',
        'imageFile.max' => 'La imagen no debe pesar más de 2MB.',
        'additionalImages.*.image' => 'Todos los archivos deben ser imágenes válidas.',
        'additionalImages.*.mimes' => 'Las imágenes deben ser de formato: jpg, jpeg, png, gif, webp, svg, bmp.',
        'additionalImages.*.max' => 'Cada imagen no debe pesar más de 2MB.',
    ];

    // Método para actualizar búsqueda
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Renderizar la vista
    public function render()
    {
        $search = trim($this->search);
        $searchTerm = $search ? '%' . $search . '%' : '';

        $query = Testimonial::query();

        if ($search) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('cliente', 'LIKE', $searchTerm)
                  ->orWhere('empresa', 'LIKE', $searchTerm)
                  ->orWhere('mensaje', 'LIKE', $searchTerm)
                  ->orWhere('cargo', 'LIKE', $searchTerm);
            });
        }

        $testimonials = $query->orderBy('id', 'desc')->paginate(10);

        return view('livewire.testimonial-crud', [
            'testimonials' => $testimonials,
        ]);
    }

    // Limpiar búsqueda
    public function resetSearch()
    {
        $this->search = '';
    }

    // Abrir modal
    public function openModal()
    {
        $this->resetValidation();
        $this->isOpen = true;
    }

    // Cerrar modal
    public function closeModal()
    {
        $this->isOpen = false;
    }

    // Resetear formulario
    public function resetInputs()
    {
        $this->testimonial_id = null;
        $this->cliente = '';
        $this->empresa = '';
        $this->mensaje = '';
        $this->cargo = '';
        $this->imagen = '';
        $this->imageFile = null;
        $this->additionalImages = [];
        $this->resetValidation();
    }

    // Guardar o actualizar testimonial
    public function store()
    {
        $this->validate();

        $imagenPath = $this->imagen;

        // Procesar imagen principal si se ha subido una nueva
        if ($this->imageFile) {
            // Eliminar archivo anterior si existe
            if ($this->testimonial_id && $this->imagen) {
                Storage::delete('public/' . $this->imagen);
            }
            $imagenPath = $this->imageFile->store('testimonials/images', 'public');
        }

        // Crear o actualizar el testimonial
        $testimonial = Testimonial::updateOrCreate(
            ['id' => $this->testimonial_id],
            [
                'cliente' => $this->cliente,
                'empresa' => $this->empresa,
                'mensaje' => $this->mensaje,
                'cargo' => $this->cargo,
                'imagen' => $imagenPath,
            ]
        );

        // Procesar imágenes adicionales si se han subido
        if (count($this->additionalImages) > 0) {
            foreach ($this->additionalImages as $image) {
                $imagePath = $image->store('testimonials/additional', 'public');
                $testimonial->images()->create([
                    'url' => $imagePath,
                ]);
            }
        }

        session()->flash('message', $this->testimonial_id ? 'Testimonio actualizado correctamente.' : 'Testimonio creado correctamente.');

        $this->closeModal();
        $this->resetInputs();
    }

    // Editar testimonial
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->testimonial_id = $id;
        $this->cliente = $testimonial->cliente;
        $this->empresa = $testimonial->empresa;
        $this->mensaje = $testimonial->mensaje;
        $this->cargo = $testimonial->cargo;
        $this->imagen = $testimonial->imagen;

        $this->openModal();
    }

    // Eliminar testimonial
    public function delete($id)
    {
        $testimonial = Testimonial::find($id);

        // Eliminar imagen principal si existe
        if ($testimonial->imagen) {
            Storage::delete('public/' . $testimonial->imagen);
        }

        // Eliminar imágenes adicionales
        foreach ($testimonial->images as $image) {
            Storage::delete('public/' . $image->url);
            $image->delete();
        }

        $testimonial->delete();
        session()->flash('message', 'Testimonio eliminado correctamente.');
    }

    // Eliminar imagen adicional
    public function deleteAdditionalImage($imageId)
    {
        $image = Image::find($imageId);

        if ($image) {
            Storage::delete('public/' . $image->url);
            $image->delete();
            session()->flash('message', 'Imagen eliminada correctamente.');
        }
    }

    // Añadir este método para eliminar una imagen temporal del array
    public function removeTemporaryImage($index)
    {
        // Filtrar el array para eliminar la imagen en el índice especificado
        $this->additionalImages = array_values(
            collect($this->additionalImages)->filter(function ($_, $key) use ($index) {
                return $key !== (int) $index;
            })->toArray()
        );
    }
}

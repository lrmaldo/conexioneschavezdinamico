<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $contactId;
    public $telefono1;
    public $telefono2;
    public $correo;
    public $direccion;
    public $facebook;
    public $instagram;
    public $whatsapp;

    public $mensaje;

    public function mount()
    {
        $contact = Contact::first();

        if ($contact) {
            $this->contactId = $contact->id;
            $this->telefono1 = $contact->telefono1;
            $this->telefono2 = $contact->telefono2;
            $this->correo = $contact->correo;
            $this->direccion = $contact->direccion;
            $this->facebook = $contact->facebook;
            $this->instagram = $contact->instagram;
            $this->whatsapp = $contact->whatsapp;
        }
    }

    public function actualizar()
    {
        $contact = Contact::find($this->contactId);

        if ($contact) {
            $contact->update([
                'telefono1' => $this->telefono1,
                'telefono2' => $this->telefono2,
                'correo' => $this->correo,
                'direccion' => $this->direccion,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'whatsapp' => $this->whatsapp,
            ]);

            $this->mensaje = '¡Información de contacto actualizada correctamente!';
            // Usar 'mostrar-modal' con guion medio para coincidir con la vista
            $this->dispatch('mostrar-modal');
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}

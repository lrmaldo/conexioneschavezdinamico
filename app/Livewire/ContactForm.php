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

    // Mensaje de feedback (modal)
    public $flashMessage;

    protected $rules = [
        'telefono1' => 'nullable|string|max:30',
        'telefono2' => 'nullable|string|max:30',
        'correo' => 'nullable|email|max:255',
        'direccion' => 'nullable|string|max:255',
        'facebook' => 'nullable|string|max:255', // podría ser url
        'instagram' => 'nullable|string|max:255', // podría ser url
        'whatsapp' => 'nullable|string|max:30',
    ];

    protected $validationAttributes = [
        'telefono1' => 'teléfono 1',
        'telefono2' => 'teléfono 2',
        'correo' => 'correo',
        'direccion' => 'dirección',
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'whatsapp' => 'WhatsApp',
    ];

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
        $data = $this->validate();

        $contact = Contact::find($this->contactId);

        if ($contact) {
            $contact->update($data);
        } else {
            $contact = Contact::create($data);
            $this->contactId = $contact->id;
        }

        $this->flashMessage = '¡Información de contacto guardada correctamente!';
        $this->dispatch('mostrar-modal');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}

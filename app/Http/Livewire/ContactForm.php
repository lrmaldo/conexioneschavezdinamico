<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class ContactForm extends Component
{
    public $nombre;
    public $email;
    public $telefono;
    public $mensaje;

    protected $rules = [
        'nombre' => 'required|min:3',
        'email' => 'required|email',
        'telefono' => 'required',
        'mensaje' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        Message::create([
            'name' => $this->nombre,
            'email' => $this->email,
            'phone' => $this->telefono,
            'message' => $this->mensaje,
        ]);

        $this->reset(['nombre', 'email', 'telefono', 'mensaje']);

        session()->flash('message', 'Mensaje enviado correctamente. Nos pondremos en contacto pronto.');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}

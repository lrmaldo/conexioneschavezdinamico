<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'telefono1' => '287 121 6143',
            'telefono2' => '287 153 6141',
            'correo' => 'manolo.chavez@hotmail.com',
            'direccion' => 'Blvd. Plan de Tuxtepec, Local 6, Col. 5 de Mayo',
            'facebook' => 'https://facebook.com/conexioneschavez',
            'instagram' => 'https://instagram.com/conexioneschavez',
            'whatsapp' => 'https://wa.me/528712345678',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horarios = [
            ['dia' => 'Lunes', 'inicio' => '08:00', 'fin' => '18:00'],
            ['dia' => 'Martes', 'inicio' => '08:00', 'fin' => '18:00'],
            ['dia' => 'Miércoles', 'inicio' => '08:00', 'fin' => '18:00'],
            ['dia' => 'Jueves', 'inicio' => '08:00', 'fin' => '18:00'],
            ['dia' => 'Viernes', 'inicio' => '08:00', 'fin' => '18:00'],
            ['dia' => 'Sábado', 'inicio' => '08:00', 'fin' => '14:00'],
            ['dia' => 'Domingo', 'inicio' => '09:00', 'fin' => '12:00'],
        ];

        foreach ($horarios as $horario) {
            Schedule::create($horario);
        }
    }
}

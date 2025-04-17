<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule;

class ScheduleManager extends Component
{
    public $schedules = [];
    public $successMessage = '';

    public function mount()
    {
        $this->loadSchedules();
    }

    private function loadSchedules()
    {
        // Obtener todos los horarios o crear uno para cada día si no existen
        $existingSchedules = Schedule::all();

        if ($existingSchedules->isEmpty()) {
            $days = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

            foreach ($days as $day) {
                Schedule::create([
                    'dia' => $day,
                    'inicio' => '09:00:00',
                    'fin' => '18:00:00',
                ]);
            }

            $this->schedules = Schedule::all()->toArray();
        } else {
            // Aseguramos que obtenemos la colección como array y verificamos la estructura
            $this->schedules = $existingSchedules->toArray();
        }
    }

    public function save()
    {
        foreach ($this->schedules as $key => $schedule) {
            Schedule::find($schedule['id'])->update([
                'inicio' => $schedule['inicio'],
                'fin' => $schedule['fin'],
            ]);
        }

        $this->successMessage = 'Los horarios se han actualizado correctamente.';

        // Limpiar el mensaje de éxito después de 5 segundos
        $this->dispatch('success-saved');
    }

    // Recargar los horarios para obtener los valores más recientes
    public function refreshSchedules()
    {
        $this->loadSchedules();
    }

    public function render()
    {
        return view('livewire.schedule-manager');
    }
}

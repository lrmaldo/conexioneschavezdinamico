<div class="p-6">
    <h2 class="text-2xl font-semibold mb-6">Administrador de Horarios Semanales</h2>

    @if($successMessage)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 success-message" role="alert">
            <span class="block sm:inline">{{ $successMessage }}</span>
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="overflow-x-auto bg-white rounded-lg shadow schedule-table">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Día
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Hora de Apertura
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Hora de Cierre
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($schedules as $index => $schedule)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 schedule-day-cell">
                                {{ $schedule['dia'] }}
                                <input type="hidden" wire:model="schedules.{{ $index }}.id">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input
                                    type="time"
                                    wire:model="schedules.{{ $index }}.inicio"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 time-input"
                                    wire:change="$dispatch('timeChanged')">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input
                                    type="time"
                                    wire:model="schedules.{{ $index }}.fin"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 time-input"
                                    wire:change="$dispatch('timeChanged')">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-end">
            <button
                type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
                Guardar cambios
            </button>
        </div>
    </form>

    <script>
        document.addEventListener('timeChanged', function() {
            // Marcar inputs modificados
            const timeInputs = document.querySelectorAll('.time-input');
            timeInputs.forEach(input => {
                if (input.defaultValue !== input.value) {
                    input.classList.add('modified');
                } else {
                    input.classList.remove('modified');
                }
            });
        });
    </script>
</div>

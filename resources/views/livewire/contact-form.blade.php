<div>
    <div class="max-w-4xl mx-auto py-8 animate__animated animate__fadeIn">
        <!-- Modal de notificación -->
        <div x-data="{ show: false }" x-show="show"
            @mostrar-modal.window="show = true; setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="fixed inset-0 z-50 flex items-center justify-center" style="display: none;">
            <div class="absolute inset-0 bg-gray-900 bg-opacity-50" x-on:click="show = false"></div>

            <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full m-4 z-10">
                <div class="flex items-center p-4 border-b border-gray-200">
                    <div class="flex-shrink-0 bg-green-100 rounded-full p-2">
                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-gray-900">¡Operación exitosa!</h3>
                    </div>
                    <button x-on:click="show = false" class="ml-auto bg-white rounded-full p-1 hover:bg-gray-100">
                        <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                    <div class="p-4">
                    <p class="text-gray-700">{{ $flashMessage ?? 'Los cambios han sido guardados correctamente.' }}</p>
                </div>

                <div class="p-4 bg-gray-50 rounded-b-lg flex justify-end">
                    <div class="relative w-full h-1 bg-gray-200 rounded overflow-hidden">
                        <div x-data="{ width: '100%' }" x-init="setTimeout(() => {
                            const interval = setInterval(() => {
                                width = parseFloat(width) - 0.5 + '%';
                                if (parseFloat(width) <= 0) {
                                    clearInterval(interval);
                                }
                            }, 25);
                        }, 0)"
                            :style="`width: ${width}; transition: width linear;`"
                            class="absolute top-0 h-1 bg-green-500 rounded"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Datos de contacto de la empresa</h2>
        <form wire:submit.prevent="actualizar" class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-gray-700 mb-2 font-medium" for="telefono1">Teléfono 1</label>
                <input wire:model.defer="telefono1" type="text" id="telefono1" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Teléfono principal">
                @error('telefono1') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-2 font-medium" for="telefono2">Teléfono 2</label>
                <input wire:model.defer="telefono2" type="text" id="telefono2" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Teléfono secundario">
                @error('telefono2') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-2 font-medium" for="correo">Correo</label>
                <input wire:model.defer="correo" type="email" id="correo" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="correo@empresa.com">
                @error('correo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-gray-700 mb-2 font-medium" for="direccion">Dirección</label>
                <input wire:model.defer="direccion" type="text" id="direccion" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Dirección completa">
                @error('direccion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-2 font-medium" for="facebook">Facebook</label>
                <input wire:model.defer="facebook" type="text" id="facebook" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="URL o usuario Facebook">
                @error('facebook') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-2 font-medium" for="instagram">Instagram</label>
                <input wire:model.defer="instagram" type="text" id="instagram" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="URL o usuario Instagram">
                @error('instagram') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-2 font-medium" for="whatsapp">WhatsApp</label>
                <input wire:model.defer="whatsapp" type="text" id="whatsapp" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Número WhatsApp">
                @error('whatsapp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="md:col-span-2 flex justify-end">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-6 rounded-lg transition-colors">Guardar</button>
            </div>
        </form>
    </div>
</div>

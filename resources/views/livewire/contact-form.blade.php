<div class="max-w-4xl mx-auto py-8 animate__animated animate__fadeIn">
    <!-- Modal de notificación -->
    <div 
        x-data="{ show: false }" 
        x-show="show" 
        @mostrar-modal.window="show = true; setTimeout(() => show = false, 5000)"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="fixed inset-0 z-50 flex items-center justify-center"
        style="display: none;"
    >
        <div class="absolute inset-0 bg-gray-900 bg-opacity-50" x-on:click="show = false"></div>

        <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full m-4 z-10">
            <div class="flex items-center p-4 border-b border-gray-200">
                <div class="flex-shrink-0 bg-green-100 rounded-full p-2">
                    <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-gray-900">¡Operación exitosa!</h3>
                </div>
                <button x-on:click="show = false" class="ml-auto bg-white rounded-full p-1 hover:bg-gray-100">
                    <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-4">
                <p class="text-gray-700">{{ $mensaje ?: 'Los cambios han sido guardados correctamente.' }}</p>
            </div>

            <div class="p-4 bg-gray-50 rounded-b-lg flex justify-end">
                <div class="relative w-full h-1 bg-gray-200 rounded overflow-hidden">
                    <div
                        x-data="{ width: '100%' }"
                        x-init="
                            setTimeout(() => {
                                const interval = setInterval(() => {
                                    width = parseFloat(width) - 0.5 + '%';
                                    if (parseFloat(width) <= 0) {
                                        clearInterval(interval);
                                    }
                                }, 25);
                            }, 0)
                        "
                        :style="`width: ${width}; transition: width linear;`"
                        class="absolute top-0 h-1 bg-green-500 rounded"
                    ></div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6">
            <h2 class="text-white text-2xl font-semibold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                Información de Contacto
            </h2>
            <p class="text-blue-100 mt-2">Actualice la información de contacto que se mostrará en su sitio web.</p>
        </div>

        <div class="p-6">
            <form wire:submit.prevent="actualizar" class="space-y-6">
                <!-- Sección de Teléfonos -->
                <fieldset>
                    <legend class="text-base font-medium text-gray-700 mb-4">Información de Contacto</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="telefono1" class="block text-sm font-medium text-gray-700">
                                Teléfono Principal
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input type="text" id="telefono1" wire:model="telefono1" class="pl-10 focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border-gray-300 shadow-sm" placeholder="(123) 456-7890">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="telefono2" class="block text-sm font-medium text-gray-700">
                                Teléfono Secundario
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input type="text" id="telefono2" wire:model="telefono2" class="pl-10 focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border-gray-300 shadow-sm" placeholder="(123) 456-7890">
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="space-y-2">
                    <label for="correo" class="block text-sm font-medium text-gray-700">
                        Correo Electrónico
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" id="correo" wire:model="correo" class="pl-10 focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border-gray-300 shadow-sm" placeholder="contacto@ejemplo.com">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="direccion" class="block text-sm font-medium text-gray-700">
                        Dirección Completa
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <textarea id="direccion" wire:model="direccion" rows="3" class="pl-10 focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Av. Principal #123, Colonia Centro, Ciudad, CP 12345"></textarea>
                    </div>
                </div>

                <!-- Sección de Redes Sociales -->
                <fieldset>
                    <legend class="text-base font-medium text-gray-700 mb-4">Redes Sociales</legend>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="group transition-all duration-300 hover:bg-blue-50 p-3 rounded-lg">
                            <label for="facebook" class="block text-sm font-medium text-gray-700 group-hover:text-blue-700">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    Facebook
                                </span>
                            </label>
                            <div class="mt-1">
                                <input type="text" id="facebook" wire:model="facebook" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border-gray-300 shadow-sm group-hover:border-blue-300" placeholder="https://facebook.com/tunegocio">
                            </div>
                        </div>

                        <div class="group transition-all duration-300 hover:bg-pink-50 p-3 rounded-lg">
                            <label for="instagram" class="block text-sm font-medium text-gray-700 group-hover:text-pink-700">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                    </svg>
                                    Instagram
                                </span>
                            </label>
                            <div class="mt-1">
                                <input type="text" id="instagram" wire:model="instagram" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border-gray-300 shadow-sm group-hover:border-pink-300" placeholder="https://instagram.com/tunegocio">
                            </div>
                        </div>

                        <div class="group transition-all duration-300 hover:bg-green-50 p-3 rounded-lg">
                            <label for="whatsapp" class="block text-sm font-medium text-gray-700 group-hover:text-green-700">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                    WhatsApp
                                </span>
                            </label>
                            <div class="mt-1">
                                <input type="text" id="whatsapp" wire:model="whatsapp" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border-gray-300 shadow-sm group-hover:border-green-300" placeholder="+52 123 456 7890">
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="pt-4 border-t border-gray-200 flex justify-end">
                    <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

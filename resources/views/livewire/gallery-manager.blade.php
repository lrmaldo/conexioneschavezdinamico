<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Mensaje Flash con animación -->
        @if (session()->has('message'))
            <div class="fixed top-4 right-4 z-50 max-w-md alert-animation" x-data="{ show: true }" x-show="show"
                x-init="setTimeout(() => show = false, 5000)">
                <div
                    class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-lg flex items-center">
                    <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <p>{{ session('message') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Cabecera con estilo mejorado -->
            <div
                class="flex flex-col md:flex-row md:items-center md:justify-between p-6 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-2xl font-bold text-gray-800 leading-tight flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Gestión de Galería
                    </h2>
                    <p class="text-gray-600 mt-1">Organiza y administra las imágenes de tu sitio web</p>
                </div>
                <button wire:click="openModal()"
                    class="relative overflow-hidden bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow-md transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500/50 group">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2 transform group-hover:rotate-12 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Agregar imagen
                    </span>
                    <span
                        class="absolute top-0 right-0 w-12 h-full bg-white opacity-10 transform -skew-x-12 transition-transform ease-out duration-700 group-hover:translate-x-20"></span>
                </button>
            </div>

            <!-- Modal mejorado para agregar/editar imágenes -->
            @if ($isOpen)
                <div class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="absolute inset-0 bg-gray-900/75 transition-opacity duration-300"></div>

                    <div
                        class="bg-white rounded-lg overflow-hidden shadow-2xl transform transition-all sm:max-w-lg sm:w-full z-10 max-h-[90vh] flex flex-col scale-in-center">
                        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-medium text-gray-900 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $isEdit ? 'Editar imagen' : 'Agregar nueva imagen' }}
                                </h3>
                                <button wire:click="closeModal()"
                                    class="text-gray-500 hover:text-gray-700 focus:outline-none transition-colors duration-200">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="px-6 py-4 overflow-y-auto flex-1">
                            <form wire:submit.prevent="store">
                                <div class="mb-5 form-field-animation">
                                    <label for="titulo"
                                        class="block text-gray-700 text-sm font-semibold mb-2">Título:</label>
                                    <input type="text" wire:model="titulo" id="titulo"
                                        class="shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500 w-full rounded-md transition-all duration-200"
                                        placeholder="Ingresa un título descriptivo">
                                    @error('titulo')
                                        <span class="text-red-500 text-xs italic mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-5 form-field-animation">
                                    <label for="descripcion"
                                        class="block text-gray-700 text-sm font-semibold mb-2">Descripción:</label>
                                    <textarea wire:model="descripcion" id="descripcion" rows="3"
                                        class="shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500 w-full rounded-md transition-all duration-200"
                                        placeholder="Describe brevemente la imagen"></textarea>
                                    @error('descripcion')
                                        <span class="text-red-500 text-xs italic mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-5 form-field-animation">
                                    <label for="categoria"
                                        class="block text-gray-700 text-sm font-semibold mb-2">Categoría:</label>
                                    <select wire:model="categoria" id="categoria"
                                        class="shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500 w-full rounded-md transition-all duration-200">
                                        <option value="">Selecciona una categoría</option>
                                        <option value="empresa">Empresa</option>
                                        <option value="servicios">Servicios</option>
                                        <option value="local">Local</option>
                                        <option value="evento">Evento</option>
                                    </select>
                                    @error('categoria')
                                        <span class="text-red-500 text-xs italic mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <label for="imagen"
                                        class="block text-gray-700 text-sm font-semibold mb-2">Imágenes:</label>
                                    <div
                                        class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition-colors duration-200 @if ($imagen) border-blue-500 bg-blue-50 @endif">
                                        <input type="file" wire:model="imagen" id="imagen" class="hidden" wire:key="imagen-upload-{{ rand() }}" multiple accept="image/*">
                                        <label for="imagen" class="cursor-pointer block w-full h-full">
                                            <!-- Interfaz siempre visible para carga de archivos -->
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                    fill="none" viewBox="0 0 48 48">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                                @if ($imagen)
                                                    <p class="mt-2 text-sm text-blue-600">
                                                        <span class="font-medium hover:text-blue-800">
                                                            @if(is_array($imagen) && count($imagen) > 1)
                                                                Cambiar imágenes ({{ count($imagen) }} seleccionadas)
                                                            @else
                                                                Cambiar imagen
                                                            @endif
                                                        </span>
                                                    </p>
                                                    <p class="mt-1 text-xs text-gray-500">Haz clic para seleccionar otras imágenes</p>
                                                @elseif($url && $isEdit)
                                                    <p class="mt-2 text-sm text-blue-600">
                                                        <span class="font-medium hover:text-blue-800">Cambiar imagen</span>
                                                    </p>
                                                    <p class="mt-1 text-xs text-gray-500">Haz clic para seleccionar otra imagen</p>
                                                @else
                                                    <p class="mt-2 text-sm text-gray-600">
                                                        <span class="font-medium text-blue-600 hover:text-blue-800">Selecciona una o varias imágenes</span>
                                                        o arrastra y suelta aquí
                                                    </p>
                                                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, JPEG hasta 2MB por imagen</p>
                                                @endif
                                            </div>
                                        </label>

                                        <div wire:loading wire:target="imagen"
                                            class="mt-2 text-sm text-blue-600 flex items-center justify-center">
                                            <svg class="animate-spin h-5 w-5 mr-2 text-blue-600"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            Procesando imágenes...
                                        </div>
                                    </div>
                                    @error('imagen')
                                        <span class="text-red-500 text-xs italic mt-1 block">{{ $message }}</span>
                                    @enderror
                                    @error('imagen.*')
                                        <span class="text-red-500 text-xs italic mt-1 block">{{ $message }}</span>
                                    @enderror

                                    @if ($url && $isEdit && !$imagen)
                                        <div class="mt-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                            <p class="text-sm text-gray-600 mb-2 font-medium">Imagen actual:</p>
                                            <div
                                                class="relative overflow-hidden rounded-lg h-48 bg-gray-100 flex items-center justify-center">
                                                <img src="{{ $url }}" alt="Imagen actual"
                                                    class="object-contain max-h-full max-w-full">
                                            </div>
                                        </div>
                                    @endif

                                    @if ($imagen)
                                        <div class="mt-4 p-4 bg-blue-50 rounded-lg border border-blue-200">
                                            <p class="text-sm text-blue-600 mb-2 font-medium">
                                                @if(is_array($imagen) && count($imagen) > 1)
                                                    Vista previa ({{ count($imagen) }} imágenes):
                                                @else
                                                    Vista previa:
                                                @endif
                                            </p>
                                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                                @if(is_array($imagen))
                                                    @foreach($imagen as $img)
                                                        <div class="relative overflow-hidden rounded-lg h-32 bg-white flex items-center justify-center">
                                                            <img src="{{ $img->temporaryUrl() }}" alt="Vista previa {{ $loop->iteration }}"
                                                                class="object-contain max-h-full max-w-full">
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="relative overflow-hidden rounded-lg h-48 bg-white flex items-center justify-center">
                                                        <img src="{{ $imagen->temporaryUrl() }}" alt="Vista previa"
                                                            class="object-contain max-h-full max-w-full">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                            <button type="button" wire:click="closeModal()"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancelar
                            </button>
                            <button type="button" wire:click="store()"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ $isEdit ? 'Actualizar' : 'Guardar' }}
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Filtros de categoría -->
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="flex flex-wrap items-center gap-2 mb-2 md:mb-0">
                        <span class="text-sm font-medium text-gray-700">Filtrar por:</span>
                        <button wire:click="filtrarPorCategoria()"
                            class="px-3 py-1 text-sm rounded-full {{ $categoriaFiltro === '' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800 hover:bg-blue-100 hover:text-blue-800' }} transition-colors duration-200">
                            Todas
                        </button>
                        <button wire:click="filtrarPorCategoria('empresa')"
                            class="px-3 py-1 text-sm rounded-full {{ $categoriaFiltro === 'empresa' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800 hover:bg-blue-100 hover:text-blue-800' }} transition-colors duration-200">
                            Empresa
                        </button>
                        <button wire:click="filtrarPorCategoria('servicios')"
                            class="px-3 py-1 text-sm rounded-full {{ $categoriaFiltro === 'servicios' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800 hover:bg-green-100 hover:text-green-800' }} transition-colors duration-200">
                            Servicios
                        </button>
                        <button wire:click="filtrarPorCategoria('local')"
                            class="px-3 py-1 text-sm rounded-full {{ $categoriaFiltro === 'local' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800 hover:bg-purple-100 hover:text-purple-800' }} transition-colors duration-200">
                            Local
                        </button>
                        <button wire:click="filtrarPorCategoria('evento')"
                            class="px-3 py-1 text-sm rounded-full {{ $categoriaFiltro === 'evento' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800 hover:bg-yellow-100 hover:text-yellow-800' }} transition-colors duration-200">
                            Evento
                        </button>
                    </div>

                    <!-- Seleccionar todas -->
                    <div class="flex items-center">
                        <label class="inline-flex items-center text-sm text-gray-700">
                            <input type="checkbox" wire:model="selectAll" class="form-checkbox rounded text-blue-600 focus:ring-blue-500 h-4 w-4">
                            <span class="ml-2">Seleccionar todas</span>
                        </label>
                    </div>
                </div>

                <!-- Acciones en lote para imágenes seleccionadas - Con soporte Alpine.js -->
                <div class="mt-3" x-data="{}" x-show="$wire.selected.length > 0" x-cloak>
                    <div class="flex items-center justify-between p-3 bg-blue-50 border border-blue-200 rounded-lg animate-fade-in">
                        <div class="text-sm text-blue-800">
                            <span class="font-medium">{{ count($selected) }}</span> imágenes seleccionadas
                        </div>
                        <div class="flex space-x-2">
                            <button
                                wire:click="deseleccionarTodas"
                                class="px-3 py-1 text-xs rounded bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors duration-200 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Deseleccionar
                            </button>

                            <button
                                wire:click="deleteSelected"
                                class="px-3 py-1 text-xs rounded bg-red-100 text-red-700 hover:bg-red-200 transition-colors duration-200 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Eliminar seleccionadas
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Galería de imágenes mejorada -->
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                    @forelse ($images as $image)
                        <div class="gallery-card group relative">
                            <!-- Checkbox de selección -->
                            <div class="absolute top-2 left-2 z-10">
                                <input type="checkbox" id="select-{{ $image->id }}"
                                    value="{{ $image->id }}"
                                    wire:model="selected"
                                    class="form-checkbox h-5 w-5 rounded text-blue-600 focus:ring-blue-500 border-gray-300 shadow-sm cursor-pointer">
                            </div>
                            <div class="gallery-image-container {{ in_array($image->id, $selected) ? 'ring-2 ring-blue-500 ring-opacity-75' : '' }}">
                                <img src="{{ $image->url }}" alt="{{ $image->titulo }}">
                                <div class="gallery-overlay">
                                    <div class="p-3 w-full flex justify-between items-center">
                                        <span class="category-badge {{ $image->categoria }}">
                                            {{ ucfirst($image->categoria) }}
                                        </span>
                                        <div class="flex space-x-1">
                                            <button wire:click="edit({{ $image->id }})" class="gallery-action-btn">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                </svg>
                                            </button>
                                            <button wire:click="confirmDelete({{ $image->id }})" class="gallery-action-btn delete-btn">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 line-clamp-1 group-hover:text-blue-600 transition-colors duration-200">
                                    {{ $image->titulo }}
                                </h3>
                                <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ $image->descripcion }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-12 flex flex-col items-center justify-center bg-gray-50 rounded-xl border-2 border-dashed border-gray-300">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <p class="mt-4 text-gray-600 text-lg font-medium">No hay imágenes en la galería</p>
                            <p class="text-gray-500 mt-1">Haz clic en "Agregar imagen" para comenzar a crear tu
                                galería</p>
                            <button wire:click="openModal()"
                                class="mt-6 px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Agregar primera imagen
                            </button>
                        </div>
                    @endforelse
                </div>
                <!-- Paginación mejorada -->
                <div class="mt-8">
                    {{ $images->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación para eliminar imagen individual -->
    <div class="fixed inset-0 flex items-center justify-center z-50 @if(!$confirmingDelete) hidden @endif">
        <div class="absolute inset-0 bg-gray-900/75 transition-opacity duration-300" wire:click="cancelDelete"></div>
        <div class="bg-white rounded-lg overflow-hidden shadow-2xl transform transition-all sm:max-w-md sm:w-full z-10 scale-in-center">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-medium text-gray-900 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Confirmar eliminación
                    </h3>
                    <button wire:click="cancelDelete" class="text-gray-500 hover:text-gray-700 focus:outline-none transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <p class="text-gray-700 mb-5">¿Estás seguro de que deseas eliminar esta imagen? Esta acción no se puede deshacer.</p>

                <div class="flex justify-end space-x-3">
                    <button type="button" wire:click="cancelDelete" class="px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        Cancelar
                    </button>
                    <button type="button" wire:click="delete" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación para eliminar múltiples imágenes -->
    <div class="fixed inset-0 flex items-center justify-center z-50 @if(!$confirmingBulkDelete) hidden @endif">
        <div class="absolute inset-0 bg-gray-900/75 transition-opacity duration-300" wire:click="cancelBulkDelete"></div>
        <div class="bg-white rounded-lg overflow-hidden shadow-2xl transform transition-all sm:max-w-md sm:w-full z-10 scale-in-center">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-medium text-gray-900 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Confirmar eliminación masiva
                    </h3>
                    <button wire:click="cancelBulkDelete" class="text-gray-500 hover:text-gray-700 focus:outline-none transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <p class="text-gray-700 mb-2">¿Estás seguro de que deseas eliminar estas <span class="font-medium">{{ count($selected) }}</span> imágenes?</p>
                <p class="text-red-600 text-sm mb-5">Esta acción no se puede deshacer.</p>

                <div class="flex justify-end space-x-3">
                    <button type="button" wire:click="cancelBulkDelete" class="px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        Cancelar
                    </button>
                    <button type="button" wire:click="confirmDeleteSelected" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                        Eliminar todas
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para manejar eventos en modales -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ya no es necesario el evento JavaScript para confirmación
            // Todo se maneja a través de los modales de Livewire
        });
    </script>

    <!-- Estilos adicionales para animaciones -->
    <style>
        @keyframes scale-in-center {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        .scale-in-center {
            animation: scale-in-center 0.3s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        @keyframes fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        .animate-fade-in {
            animation: fade-in 0.3s ease-in-out;
        }
    </style>
</div>

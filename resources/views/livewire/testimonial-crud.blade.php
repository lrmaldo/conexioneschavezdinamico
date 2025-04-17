<div class="bg-gray-50 min-h-screen" x-data="{ showPreview: false }">
    <!-- Header -->
    <div class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-800">Gestión de Testimonios</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Acción y búsqueda -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 mb-6">
            <div class="w-full md:w-1/3">
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        wire:model.live.debounce.300ms="search"
                        type="text"
                        class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200"
                        placeholder="Buscar por cliente, empresa o testimonio..."
                    >
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        @if($search)
                            <button wire:click="resetSearch" class="text-gray-400 hover:text-gray-600 focus:outline-none" title="Limpiar búsqueda">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <div wire:loading.delay wire:target="search" class="text-gray-400">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
                @if($search)
                    <div class="mt-1 text-sm text-indigo-600 flex items-center">
                        <span>Buscando: "{{ $search }}" ({{ $testimonials->total() }} resultados)</span>
                        <button wire:click="resetSearch" class="ml-2 text-xs text-gray-500 hover:text-indigo-700 focus:outline-none">
                            Limpiar
                        </button>
                    </div>
                @endif
            </div>
            <div>
                <button wire:click="openModal()" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Nuevo Testimonio
                </button>
            </div>
        </div>

        <!-- Notificaciones -->
        @if (session()->has('message'))
            <div class="rounded-md bg-green-50 p-4 mb-6 animate__animated animate__fadeIn">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('message') }}
                        </p>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                                <span class="sr-only">Descartar</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Tabla de Testimonios -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Empresa</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Testimonio</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cargo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagen</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($testimonials as $testimonial)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $testimonial->cliente }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $testimonial->empresa ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500 max-w-xs truncate">{{ $testimonial->mensaje }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $testimonial->cargo ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($testimonial->imagen)
                                        <div class="h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                                            <img src="{{ Storage::url($testimonial->imagen) }}" alt="Imagen" class="h-10 w-10 object-cover">
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-500">Sin imagen</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button wire:click="edit({{ $testimonial->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</button>
                                    <button onclick="confirm('¿Estás seguro de eliminar este testimonio?') || event.stopImmediatePropagation()" wire:click="delete({{ $testimonial->id }})" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No hay testimonios</h3>
                                    <p class="mt-1 text-sm text-gray-500">Comienza agregando un nuevo testimonio usando el botón superior.</p>
                                    <div class="mt-6 mb-3">
                                        <button wire:click="openModal()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                            </svg>
                                            Nuevo Testimonio
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $testimonials->links() }}
        </div>

        <!-- Modal para crear/editar -->
        @if($isOpen)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div>
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100">
                            <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{ $testimonial_id ? 'Actualizar Testimonio' : 'Crear Nuevo Testimonio' }}
                            </h3>
                        </div>
                    </div>

                    <form wire:submit.prevent="store" class="mt-5">
                        <!-- Botones para cambiar entre formulario y vista previa -->
                        <div class="flex border-b border-gray-200 mb-4">
                            <button
                                type="button"
                                @click="showPreview = false"
                                class="py-2 px-4 focus:outline-none"
                                :class="!showPreview ? 'border-b-2 border-indigo-500 font-medium text-indigo-600' : 'text-gray-500 hover:text-gray-700'"
                            >
                                Editar
                            </button>
                            <button
                                type="button"
                                @click="showPreview = true"
                                class="py-2 px-4 focus:outline-none"
                                :class="showPreview ? 'border-b-2 border-indigo-500 font-medium text-indigo-600' : 'text-gray-500 hover:text-gray-700'"
                            >
                                Vista previa
                            </button>
                        </div>

                        <!-- Formulario de edición -->
                        <div x-show="!showPreview">
                            <div class="space-y-4">
                                <div>
                                    <label for="cliente" class="block text-sm font-medium text-gray-700">Cliente</label>
                                    <input type="text" wire:model="cliente" id="cliente" class="block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200">
                                    @error('cliente') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="empresa" class="block text-sm font-medium text-gray-700">Empresa</label>
                                    <input type="text" wire:model="empresa" id="empresa" class="block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200">
                                    @error('empresa') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo</label>
                                    <input type="text" wire:model="cargo" id="cargo" class="block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200">
                                    @error('cargo') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="mensaje" class="block text-sm font-medium text-gray-700">Testimonio</label>
                                    <textarea wire:model="mensaje" id="mensaje" rows="3" class="mt-1 block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200"></textarea>
                                    @error('mensaje') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="imageFile" class="block text-sm font-medium text-gray-700">Imagen Principal</label>
                                    <div class="mt-1 flex items-center">
                                        @if($imagen && !$imageFile)
                                            <div class="mr-3 h-12 w-12 rounded overflow-hidden bg-gray-100 flex items-center justify-center">
                                                <img src="{{ Storage::url($imagen) }}" alt="Imagen actual" class="h-12 w-12 object-cover">
                                            </div>
                                        @endif

                                        @if($imageFile)
                                            <div class="mr-3 h-12 w-12 rounded overflow-hidden bg-gray-100 flex items-center justify-center">
                                                <img src="{{ $imageFile->temporaryUrl() }}" alt="Vista previa" class="h-12 w-12 object-cover">
                                            </div>
                                        @endif

                                        <div class="flex-1">
                                            <label class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 cursor-pointer">
                                                <span>{{ $imagen || $imageFile ? 'Cambiar imagen' : 'Subir imagen' }}</span>
                                                <input type="file" wire:model="imageFile" id="imageFile" class="sr-only" accept="image/*">
                                            </label>
                                        </div>
                                    </div>
                                    <div wire:loading wire:target="imageFile" class="text-sm text-gray-500 mt-1">Cargando...</div>
                                    @error('imageFile') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="additionalImages" class="block text-sm font-medium text-gray-700">Imágenes Adicionales</label>
                                    <div class="mt-1">
                                        <label class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 cursor-pointer">
                                            <span>Subir imágenes adicionales</span>
                                            <input type="file" wire:model="additionalImages" id="additionalImages" class="sr-only" accept="image/*" multiple>
                                        </label>
                                    </div>
                                    <div wire:loading wire:target="additionalImages" class="text-sm text-gray-500 mt-1">Cargando...</div>
                                    @error('additionalImages.*') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

                                    {{-- Vista previa de imágenes adicionales --}}
                                    @if(count($additionalImages) > 0)
                                        <div class="mt-4 grid grid-cols-3 gap-4">
                                            @foreach($additionalImages as $index => $image)
                                                @if($image)
                                                    <div class="relative group">
                                                        <div class="h-24 w-full rounded overflow-hidden bg-gray-100 flex items-center justify-center">
                                                            <img src="{{ $image->temporaryUrl() }}" alt="Vista previa" class="h-full w-full object-cover">
                                                        </div>
                                                        <button type="button" wire:click="removeTemporaryImage({{ $index }})" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 transform translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-150">
                                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    {{-- Mostrar imágenes existentes en edición --}}
                                    @if($testimonial_id && isset($testimonial) && $testimonial->images->count() > 0)
                                        <div class="mt-4">
                                            <h4 class="text-sm font-medium text-gray-700 mb-2">Imágenes existentes</h4>
                                            <div class="grid grid-cols-3 gap-4">
                                                @foreach($testimonial->images as $image)
                                                    <div class="relative group">
                                                        <div class="h-24 w-full rounded overflow-hidden bg-gray-100 flex items-center justify-center">
                                                            <img src="{{ Storage::url($image->url) }}" alt="Imagen adicional" class="h-full w-full object-cover">
                                                        </div>
                                                        <button type="button" wire:click="deleteAdditionalImage({{ $image->id }})" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 transform translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-150">
                                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Vista previa del testimonio -->
                        <div x-show="showPreview" class="bg-white rounded-lg shadow-md overflow-hidden transition-all">
                            <div class="p-6">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <template x-if="$wire.imageFile || $wire.imagen">
                                            <div class="h-16 w-16 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                                                <img x-bind:src="$wire.imageFile ? URL.createObjectURL($wire.imageFile) : '{{ $imagen ? Storage::url($imagen) : '' }}'" alt="Imagen" class="h-full w-full object-cover">
                                            </div>
                                        </template>
                                        <template x-if="!$wire.imageFile && !$wire.imagen">
                                            <div class="h-16 w-16 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <span class="text-indigo-700 font-medium text-xl" x-text="$wire.cliente.charAt(0).toUpperCase()"></span>
                                            </div>
                                        </template>
                                    </div>
                                    <div>
                                        <div class="text-lg font-medium text-gray-900" x-text="$wire.cliente || 'Nombre del cliente'"></div>
                                        <div class="text-sm text-gray-500">
                                            <span x-text="$wire.cargo || 'Cargo'"></span> en <span x-text="$wire.empresa || 'Empresa'"></span>
                                        </div>
                                        <div class="mt-2 text-gray-700">
                                            <p x-text="$wire.mensaje || 'El texto del testimonio aparecerá aquí...'"></p>
                                        </div>

                                        <!-- Imágenes adicionales preview -->
                                        <div class="mt-4" x-show="$wire.additionalImages.length > 0">
                                            <p class="text-sm font-medium text-gray-500 mb-2">Imágenes adicionales:</p>
                                            <div class="flex flex-wrap gap-2">
                                                <template x-for="(image, index) in $wire.additionalImages" :key="index">
                                                    <div class="h-16 w-16 rounded overflow-hidden bg-gray-100">
                                                        <img :src="URL.createObjectURL(image)" alt="Imagen adicional" class="h-full w-full object-cover">
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                                {{ $testimonial_id ? 'Guardar cambios' : 'Crear testimonio' }}
                            </button>
                            <button type="button" wire:click="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

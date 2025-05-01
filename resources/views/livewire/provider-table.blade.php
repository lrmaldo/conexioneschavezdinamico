<div>
    <!-- Panel de búsqueda y filtros -->
    <div class="mb-8 bg-black/50 p-6 rounded-lg shadow-lg border border-yellow-500/30">
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
            <div class="flex-1">
                <label for="search" class="block text-sm font-medium text-gray-300 mb-1">Buscar proveedor</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model.live="search" type="text" id="search" class="block w-full pl-10 pr-3 py-2 rounded-md bg-gray-800 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Buscar por nombre o descripción...">
                </div>
            </div>
            <div class="md:w-1/3">
                <label for="category" class="block text-sm font-medium text-gray-300 mb-1">Filtrar por categoría</label>
                <select wire:model.live="selectedCategory" id="category" class="block w-full py-3 rounded-md bg-gray-800 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    <option value="">Todas las categorías</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Indicador de carga -->
    <div wire:loading class="flex justify-center my-8">
        <div class="animate-pulse flex space-x-4 items-center">
            <div class="h-3 w-3 bg-yellow-500 rounded-full"></div>
            <div class="h-3 w-3 bg-yellow-500 rounded-full"></div>
            <div class="h-3 w-3 bg-yellow-500 rounded-full"></div>
            <span class="text-yellow-500">Cargando proveedores...</span>
        </div>
    </div>

    <!-- Lista de proveedores -->
    <div wire:loading.remove>
        @if($providers->isEmpty())
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-300">No se encontraron proveedores</h3>
                <p class="mt-1 text-sm text-gray-400">Prueba ajustando tu búsqueda o filtros.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($providers as $provider)
                    <div class="industrial-card bg-gradient-to-br from-black/80 to-gray-900/90 rounded-lg shadow-xl overflow-hidden border border-gray-800 hover:border-yellow-500/50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-yellow-500/10 relative group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <!-- Logo destacado con efecto mejorado -->
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-b from-yellow-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            @if($provider->logo)
                                <div class="w-full h-48 bg-gradient-to-b from-gray-800/80 to-black/90 p-4 flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset('storage/'.$provider->logo) }}" alt="{{ $provider->nombre }} logo"
                                         class="max-h-40 max-w-[90%] object-contain filter drop-shadow-lg transition-all duration-500
                                                group-hover:scale-110 group-hover:drop-shadow-[0_0_8px_rgba(234,179,8,0.3)]">
                                </div>
                            @else
                                <div class="w-full h-48 bg-gradient-to-b from-gray-800/80 to-black/90 flex items-center justify-center">
                                    <div class="text-center">
                                        <svg class="h-16 w-16 text-gray-600 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-gray-500 italic text-sm block mt-2">Logo no disponible</span>
                                    </div>
                                </div>
                            @endif

                            <!-- Etiqueta de categoría con diseño mejorado -->
                            <span class="absolute right-3 top-3 inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium
                                         bg-black/80 text-yellow-500 border border-yellow-500/30 shadow-lg backdrop-blur-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                {{ $provider->category->nombre ?? 'Sin categoría' }}
                            </span>
                        </div>

                        <div class="p-5 relative bg-gradient-to-b from-transparent to-black/40">
                            <!-- Nombre y detalles del proveedor -->
                            <div class="flex items-center mb-3">
                                @if($provider->icono)
                                    <div class="flex-shrink-0 bg-gradient-to-br from-gray-800 to-black p-2 rounded-lg shadow-md border border-gray-700 mr-3">
                                        <img src="{{ asset('storage/'.$provider->icono) }}" alt="{{ $provider->nombre }} icono" class="w-8 h-8 object-contain">
                                    </div>
                                @endif
                                <h3 class="text-xl font-bold text-white text-shadow-sm">{{ $provider->nombre }}</h3>
                            </div>

                            <p class="mt-2 text-gray-300 text-sm line-clamp-2 min-h-[40px]">{{ $provider->descripcion }}</p>

                            <div class="mt-4 pt-3 border-t border-gray-700/50 flex justify-end">
                              {{--   <button class="bg-gray-800/80 hover:bg-yellow-600 text-yellow-500 hover:text-black text-sm font-medium flex items-center group/btn py-1.5 px-3 rounded-md transition-all duration-300">
                                    Ver detalles
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5 transition-transform group-hover/btn:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-8">
                {{ $providers->links(data: ['scrollTo' => false]) }}
            </div>
        @endif
    </div>

    <style>
        /* Estilos para la paginación */
        .pagination-links nav div:first-child {
            @apply hidden;
        }

        .pagination-links nav div:last-child span,
        .pagination-links nav div:last-child a {
            @apply bg-black border-gray-700 text-gray-300;
        }

        .pagination-links nav div:last-child span.bg-blue-50 {
            @apply bg-yellow-500 text-black font-bold border-yellow-500;
        }

        .pagination-links nav div:last-child a:hover {
            @apply bg-gray-800 border-yellow-500;
        }
    </style>
</div>

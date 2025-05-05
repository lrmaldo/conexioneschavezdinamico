<div>
    <!-- Barra de búsqueda y filtros - Sin animaciones -->
    <div class="industrial-card bg-black/80 p-6 rounded-lg shadow-xl mb-8">
        <div class="flex flex-col md:flex-row gap-4 md:items-end">
            <div class="md:w-1/3">
                <label for="search" class="block text-white font-medium mb-2">Buscar productos</label>
                <div class="relative">
                    <input
                        type="text"
                        wire:model.live="search"
                        class="w-full bg-gray-800 text-white border border-gray-700 rounded-lg py-2 px-4 pl-10 focus:outline-none focus:border-yellow-500"
                        placeholder="Nombre o descripción..."
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div class="md:w-1/3">
                <label for="category" class="block text-white font-medium mb-2">Filtrar por categoría</label>
                <select
                    wire:model.live="category"
                    class="w-full bg-gray-800 text-white border border-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:border-yellow-500"
                >
                    <option value="">Todas las categorías</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="md:w-1/3 flex justify-end">
                <button
                    wire:click="resetFilters"
                    class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition-colors"
                >
                    <i class="fas fa-sync-alt mr-2"></i>Reiniciar filtros
                </button>
            </div>
        </div>
    </div>

    <!-- Resultados de la búsqueda - Sin animaciones -->
    <div class="mb-6 text-white flex flex-col sm:flex-row justify-between items-center gap-2">
        <div>
            <span class="font-bold text-yellow-500">{{ $products->count() }}</span> de
            <span class="font-bold text-yellow-500">{{ $products->total() }}</span> productos
        </div>
        <div class="flex items-center gap-2">
            @if($search)
                <span class="bg-yellow-500 text-black px-3 py-1 rounded-full text-xs">
                    Búsqueda: "{{ $search }}"
                    <button wire:click="$set('search', '')" class="ml-1 hover:text-gray-800">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </span>
            @endif

            @if($category)
                @php
                    $selectedCategory = $categories->firstWhere('id', $category);
                @endphp
                <span class="bg-yellow-500 text-black px-3 py-1 rounded-full text-xs">
                    Categoría: "{{ $selectedCategory ? $selectedCategory->nombre : '' }}"
                    <button wire:click="$set('category', '')" class="ml-1 hover:text-gray-800">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </span>
            @endif
        </div>
    </div>

    <!-- Indicador de carga mejorado para no afectar el layout -->
    <div wire:loading wire:target="search, category, resetFilters, gotoPage, nextPage, previousPage" class="fixed top-4 right-4 bg-yellow-500 text-black px-4 py-2 rounded-lg shadow-lg z-50">
        <div class="inline-block animate-spin mr-2">
            <i class="fas fa-circle-notch"></i>
        </div>
        <span>Cargando...</span>
    </div>

    <!-- Listado de productos - SIN ANIMACIONES -->
    <div>
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-10">
                @foreach($products as $product)
                    <div class="industrial-card bg-black/70 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                        <div class="relative h-48 overflow-hidden">
                            @if($product->imagen)
                                <img
                                    src="{{ asset('storage/' . $product->imagen) }}"
                                    alt="{{ $product->nombre }}"
                                    class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                >
                            @else
                                <div class="w-full h-full bg-gray-800 flex items-center justify-center">
                                    <i class="{{ $product->icono ?? 'fas fa-boxes' }} text-5xl text-yellow-500"></i>
                                </div>
                            @endif
                            <div class="absolute top-2 right-2 bg-yellow-500 text-black px-2 py-1 rounded-full text-xs font-bold">
                                {{ $product->category->nombre }}
                            </div>
                            @if($product->codigo)
                                <div class="absolute top-2 left-2 bg-gray-900/80 text-white px-2 py-1 rounded-full text-xs font-mono">
                                    {{ $product->codigo }}
                                </div>
                            @endif
                        </div>

                        <div class="p-4">
                            <div class="flex items-start mb-2">
                                <div class="text-xl text-yellow-500 mr-2">
                                    <i class="{{ $product->icono ?? 'fas fa-cog' }}"></i>
                                </div>
                                <h2 class="text-lg font-bold text-white flex-1">{{ $product->nombre }}</h2>
                            </div>

                            @if($product->codigo)
                                <p class="text-gray-300 text-xs font-mono mb-2">Cód: {{ $product->codigo }}</p>
                            @endif

                            <p class="text-gray-400 text-sm mb-4 line-clamp-2">{{ $product->descripcion }}</p>

                            <a
                                href="{{ route('products.show', $product) }}"
                                class="block w-full bg-gray-800 hover:bg-yellow-500 text-white hover:text-black text-center py-2 rounded transition-colors duration-300 font-medium"
                            >
                                Ver más <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación - Sin animaciones -->
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @else
            <div class="bg-black/60 text-white p-8 rounded-lg text-center">
                <i class="fas fa-search text-5xl text-yellow-500 mb-4"></i>
                <h3 class="text-2xl font-bold mb-2">No se encontraron productos</h3>
                <p class="text-gray-400">Intenta con otros términos de búsqueda o elimina los filtros aplicados.</p>
            </div>
        @endif
    </div>
</div>

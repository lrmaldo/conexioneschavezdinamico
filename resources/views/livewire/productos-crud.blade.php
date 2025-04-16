<div class="bg-gray-50 min-h-screen">
    <!-- Cabecera con título y botones de acción -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Productos</h1>
                <p class="mt-1 text-sm text-gray-600">Gestiona tu catálogo de productos</p>
            </div>
            <button
                wire:click="openModal()"
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300"
            >
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Nuevo Producto
            </button>
        </div>

        <!-- Notificación de éxito -->
        @if (session()->has('message'))
            <div class="mt-6 flex items-center p-4 mb-4 text-sm text-green-800 border-l-4 border-green-500 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800 animate-fade-in-down" role="alert">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
                <span>{{ session('message') }}</span>
            </div>
        @endif

        <!-- Controles de filtrado y búsqueda -->
        <div class="mt-6 bg-white shadow rounded-lg overflow-hidden">
            <div class="p-4 sm:p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Buscador -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        wire:model.live.debounce.300ms="search"
                        type="text"
                        placeholder="Buscar productos..."
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200"
                    >
                </div>

                <!-- Filtro por categoría -->
                <div>
                    <select
                        wire:model.live="categoryFilter"
                        class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md transition-colors duration-200"
                    >
                        <option value="">Todas las categorías</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtro por número de resultados -->
                <div>
                    <select
                        wire:model.live="perPage"
                        class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md transition-colors duration-200"
                    >
                        <option value="8">8 por página</option>
                        <option value="16">16 por página</option>
                        <option value="24">24 por página</option>
                        <option value="32">32 por página</option>
                    </select>
                </div>

                <!-- Ordenar por -->
                <div>
                    <select
                        wire:model.live="sortField"
                        class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md transition-colors duration-200"
                    >
                        <option value="created_at">Fecha de creación</option>
                        <option value="nombre">Nombre</option>
                        <option value="category_id">Categoría</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Listado de productos con tarjetas -->
        <div class="mt-6">
            @if(count($productos) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($productos as $producto)
                        <div class="bg-white overflow-hidden shadow-md rounded-lg transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1 flex flex-col">
                            <!-- Contenedor de imagen con altura fija -->
                            <div class="relative h-48 overflow-hidden">
                                @if($producto->imagen)
                                    <img src="{{ Storage::url($producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <svg class="h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                <!-- Badge para categoría -->
                                <div class="absolute top-2 left-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                        {{ $producto->category->nombre ?? 'Sin categoría' }}
                                    </span>
                                </div>

                                <!-- Contador de imágenes -->
                                @if(count($producto->images) > 0)
                                    <div class="absolute top-2 right-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <svg class="h-3 w-3 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ count($producto->images) + 1 }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Contenido de la tarjeta con espaciado adecuado -->
                            <div class="p-4 flex-grow flex flex-col">
                                <!-- Encabezado con icono y título -->
                                <div class="flex items-center mb-3">
                                    @if($producto->icono)
                                        <div class="flex-shrink-0 mr-3">
                                            <img src="{{ Storage::url($producto->icono) }}" alt="Icono" class="h-8 w-8 object-cover rounded">
                                        </div>
                                    @endif
                                    <h3 class="text-lg font-semibold text-gray-900 leading-tight">{{ $producto->nombre }}</h3>
                                </div>

                                <!-- Descripción del producto -->
                                <p class="text-sm text-gray-600 line-clamp-2 mb-4">{{ $producto->descripcion }}</p>

                                <!-- Botones de acción en la parte inferior -->
                                <div class="mt-auto flex justify-end space-x-2">
                                    <button
                                        wire:click="edit({{ $producto->id }})"
                                        class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200"
                                    >
                                        <svg class="-ml-0.5 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        Editar
                                    </button>
                                    <button
                                        wire:click="$dispatch('confirm-delete', {{ $producto->id }})"
                                        class="inline-flex items-center px-3 py-1.5 border border-red-300 text-sm leading-4 font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200"
                                    >
                                        <svg class="-ml-0.5 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Paginación -->
                <div class="mt-6">
                    {{ $productos->links() }}
                </div>
            @else
                <div class="bg-white shadow rounded-lg p-8 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No hay productos</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        No se encontraron productos que coincidan con tu búsqueda.
                    </p>
                    <div class="mt-6">
                        <button
                            wire:click="openModal()"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Nuevo Producto
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal para crear/editar producto -->
    @if($isOpen)
        <div
            class="fixed z-50 inset-0 overflow-y-auto"
            x-data="{}"
            x-init="$nextTick(() => { document.body.classList.add('overflow-hidden'); $el.querySelector('input[type=text]').focus(); })"
            x-on:keydown.escape.window="$wire.closeModal(); document.body.classList.remove('overflow-hidden');"
        >
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6"
                    x-on:click.away="$wire.closeModal(); document.body.classList.remove('overflow-hidden');"
                >
                    <div class="absolute top-0 right-0 pt-4 pr-4">
                        <button
                            wire:click="closeModal()"
                            class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            x-on:click="document.body.classList.remove('overflow-hidden');"
                        >
                            <span class="sr-only">Cerrar</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-xl leading-6 font-bold text-gray-900 pb-2 border-b">
                                {{ $editing ? 'Editar Producto' : 'Crear Nuevo Producto' }}
                            </h3>

                            <form wire:submit.prevent="store" class="mt-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                        <div class="mt-1">
                                            <input
                                                type="text"
                                                id="nombre"
                                                wire:model.defer="nombre"
                                                class="sblock w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200"
                                                placeholder="Nombre del producto"
                                            >
                                        </div>
                                        @error('nombre') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>

                                    <div>
                                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                                        <div class="mt-1">
                                            <select
                                                id="category_id"
                                                wire:model.defer="category_id"
                                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200"
                                            >
                                                <option value="">Seleccionar categoría</option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                                    <div class="mt-1">
                                        <textarea
                                            id="descripcion"
                                            wire:model.defer="descripcion"
                                            rows="4"
                                            class="shadow-sm block w-full px-4 py-3 border border-gray-300 rounded-md text-gray-700 leading-relaxed bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 hover:border-gray-400 transition-all duration-200 ease-in-out resize-y"
                                            placeholder="Describe el producto con detalle..."
                                        ></textarea>
                                    </div>
                                    @error('descripcion') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Icono</label>
                                        <div class="mt-1 flex items-center">
                                            <div class="bg-gray-100 rounded-lg p-2 mr-4 w-16 h-16 flex items-center justify-center overflow-hidden">
                                                @if($icono && !is_string($icono))
                                                    <img src="{{ $icono->temporaryUrl() }}" class="max-h-full object-cover">
                                                @elseif($icono)
                                                    <img src="{{ Storage::url($icono) }}" class="max-h-full object-cover">
                                                @else
                                                    <svg class="h-8 w-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                @endif
                                            </div>
                                            <label for="icono" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Cambiar
                                                <input type="file" id="icono" wire:model="icono" class="sr-only">
                                            </label>
                                        </div>
                                        @error('icono') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Imagen Principal</label>
                                        <div class="mt-1 flex items-center">
                                            <div class="bg-gray-100 rounded-lg p-2 mr-4 w-16 h-16 flex items-center justify-center overflow-hidden">
                                                @if($imagen && !is_string($imagen))
                                                    <img src="{{ $imagen->temporaryUrl() }}" class="max-h-full object-cover">
                                                @elseif($imagen)
                                                    <img src="{{ Storage::url($imagen) }}" class="max-h-full object-cover">
                                                @else
                                                    <svg class="h-8 w-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                @endif
                                            </div>
                                            <label for="imagen" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Cambiar
                                                <input type="file" id="imagen" wire:model="imagen" class="sr-only">
                                            </label>
                                        </div>
                                        @error('imagen') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <label class="block text-sm font-medium text-gray-700">Imágenes adicionales</label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="imagenes" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Subir archivos</span>
                                                    <input id="imagenes" wire:model="imagenes" type="file" multiple class="sr-only">
                                                </label>
                                                <p class="pl-1">o arrastrar y soltar</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 1MB</p>
                                        </div>
                                    </div>
                                    @error('imagenes.*') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror

                                    <!-- Preview de imágenes temporales -->
                                    @if($imagenes)
                                        <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                            @foreach($imagenes as $tempImage)
                                                <div class="relative group">
                                                    <img src="{{ $tempImage->temporaryUrl() }}" class="h-24 w-full object-cover rounded-lg">
                                                    <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                                        <button type="button" wire:click="$set('imagenes', [])" class="text-white">
                                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <!-- Imágenes guardadas -->
                                    @if($editing && $product_id)
                                        <div class="mt-4">
                                            <h4 class="font-medium text-sm text-gray-700">Imágenes guardadas</h4>
                                            <div class="mt-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                                @foreach($productImages as $image)
                                                    <div class="relative group">
                                                        <img src="{{ Storage::url($image->url) }}" class="h-24 w-full object-cover rounded-lg">
                                                        <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                                            <button type="button" wire:click="deleteImage({{ $image->id }})" class="text-white hover:text-red-400">
                                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-8 flex justify-end space-x-3">
                                    <button
                                        type="button"
                                        wire:click="closeModal()"
                                        class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        x-on:click="document.body.classList.remove('overflow-hidden');"
                                    >
                                        Cancelar
                                    </button>
                                    <button
                                        type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        {{ $editing ? 'Actualizar' : 'Guardar' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Script para confirmar eliminación -->
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('confirm-delete', id => {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede revertir",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('delete', id);
                    }
                })
            });
        });
    </script>

    <!-- Estilos adicionales para animaciones y transiciones -->
    <style>
        /* Animación para la notificación */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translate3d(0, -20px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .animate-fade-in-down {
            animation: fadeInDown 0.5s ease-out;
        }

        /* Truncar texto con ellipsis después de 2 líneas */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Proporción 2:3 para las imágenes en las tarjetas */
        .pb-2\/3 {
            padding-bottom: 75%;
        }
    </style>
</div>

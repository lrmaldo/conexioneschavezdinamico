<div class="bg-gray-50 min-h-screen" x-data="{ viewMode: @entangle('viewMode').defer ?? 'cards' }">
    <!-- Header -->
    <div class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-800">Gestión de Proveedores</h1>
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
                        placeholder="Buscar por nombre, descripción o categoría..."
                        autofocus
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
                        <span>Buscando: "{{ $search }}" ({{ $providers->total() }} resultados)</span>
                        <button wire:click="resetSearch" class="ml-2 text-xs text-gray-500 hover:text-indigo-700 focus:outline-none">
                            Limpiar
                        </button>
                    </div>
                @endif
            </div>
            <div class="flex items-center space-x-3">
                <!-- Botón para cambiar vista -->
                <button wire:click="toggleViewMode" class="text-sm inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        @if($viewMode === 'cards')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm0 8a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zm12 0a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        @endif
                    </svg>
                    {{ $viewMode === 'cards' ? 'Cambiar a vista de tabla' : 'Cambiar a vista de tarjetas' }}
                </button>

                <!-- Botón Nuevo Proveedor -->
                <button wire:click="openModal()" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Nuevo Proveedor
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

        <!-- Contenido principal: Tarjetas o Tabla según viewMode -->
        @if($viewMode === 'cards')
            <!-- Vista de Tarjetas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-6">
                @forelse ($providers as $provider)
                    <div class="bg-white overflow-hidden shadow rounded-lg transition-all duration-200 hover:shadow-md">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    @if($provider->icono)
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                                            <img src="{{ Storage::url($provider->icono) }}" alt="Icono" class="h-10 w-10 object-cover">
                                        </div>
                                    @else
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <span class="text-indigo-700 font-medium text-lg">{{ substr($provider->nombre, 0, 1) }}</span>
                                        </div>
                                    @endif
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900 truncate">{{ $provider->nombre }}</h3>
                                        <div class="text-sm text-gray-500">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $provider->category->nombre ?? 'Sin categoría' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-500">#{{ $provider->id }}</span>
                            </div>

                            <div class="mt-2">
                                <p class="text-sm text-gray-600 line-clamp-3">{{ $provider->descripcion }}</p>
                            </div>

                            @if($provider->logo)
                                <div class="mt-4 h-20 flex items-center justify-center bg-gray-50 rounded p-2">
                                    <img src="{{ Storage::url($provider->logo) }}" alt="Logo" class="h-full max-h-16 object-contain">
                                </div>
                            @endif

                            <div class="mt-4 flex space-x-2">
                                <button wire:click="edit({{ $provider->id }})" class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Editar
                                </button>
                                <button onclick="confirm('¿Estás seguro de eliminar este proveedor?') || event.stopImmediatePropagation()" wire:click="delete({{ $provider->id }})" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-6 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No hay proveedores</h3>
                            <p class="mt-1 text-sm text-gray-500">Comienza agregando un nuevo proveedor usando el botón superior.</p>
                            <div class="mt-6">
                                <button wire:click="openModal()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Nuevo Proveedor
                                </button>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        @else
            <!-- Vista de Tabla -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proveedor</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($providers as $provider)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $provider->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if($provider->icono)
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden">
                                                    <img src="{{ Storage::url($provider->icono) }}" alt="Icono" class="h-10 w-10 object-cover">
                                                </div>
                                            @else
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                    <span class="text-indigo-700 font-medium text-lg">{{ substr($provider->nombre, 0, 1) }}</span>
                                                </div>
                                            @endif
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $provider->nombre }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500 max-w-xs truncate">{{ $provider->descripcion }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $provider->category->nombre ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button wire:click="edit({{ $provider->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</button>
                                        <button onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" wire:click="delete({{ $provider->id }})" class="text-red-600 hover:text-red-900">Eliminar</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No hay proveedores</h3>
                                        <p class="mt-1 text-sm text-gray-500">Comienza agregando un nuevo proveedor usando el botón superior.</p>
                                        <div class="mt-6">
                                            <button wire:click="openModal()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                                </svg>
                                                Nuevo Proveedor
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <!-- Paginación -->
        <div class="mt-4">
            {{ $providers->links() }}
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{ $provider_id ? 'Actualizar Proveedor' : 'Crear Nuevo Proveedor' }}
                            </h3>
                        </div>
                    </div>

                    <form wire:submit.prevent="store" class="mt-5">
                        <div class="space-y-4">
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input type="text" wire:model="nombre" id="nombre" class="block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200">
                                @error('nombre') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                                <textarea wire:model="descripcion" id="descripcion" rows="3" class="mt-1 block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-colors duration-200"></textarea>
                                @error('descripcion') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                                <select wire:model="category_id" id="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Selecciona una categoría</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="iconoFile" class="block text-sm font-medium text-gray-700">Icono</label>
                                <div class="mt-1 flex items-center">
                                    @if($icono && !$iconoFile)
                                        <div class="mr-3 h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                            <img src="{{ Storage::url($icono) }}" alt="Icono actual" class="h-12 w-12 object-cover">
                                        </div>
                                    @endif

                                    @if($iconoFile)
                                        <div class="mr-3 h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                            <img src="{{ $iconoFile->temporaryUrl() }}" alt="Vista previa" class="h-12 w-12 object-cover">
                                        </div>
                                    @endif

                                    <div class="flex-1">
                                        <label class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 cursor-pointer">
                                            <span>{{ $icono || $iconoFile ? 'Cambiar icono' : 'Subir icono' }}</span>
                                            <input type="file" wire:model="iconoFile" id="iconoFile" class="sr-only" accept="image/*">
                                        </label>
                                    </div>
                                </div>
                                <div wire:loading wire:target="iconoFile" class="text-sm text-gray-500 mt-1">Cargando...</div>
                                @error('iconoFile') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="logoFile" class="block text-sm font-medium text-gray-700">Logo</label>
                                <div class="mt-1 flex items-center">
                                    @if($logo && !$logoFile)
                                        <div class="mr-3 h-14 w-auto rounded overflow-hidden bg-gray-100 p-1 flex items-center">
                                            <img src="{{ Storage::url($logo) }}" alt="Logo actual" class="h-12 max-w-[100px] object-contain">
                                        </div>
                                    @endif

                                    @if($logoFile)
                                        <div class="mr-3 h-14 w-auto rounded overflow-hidden bg-gray-100 p-1 flex items-center">
                                            <img src="{{ $logoFile->temporaryUrl() }}" alt="Vista previa" class="h-12 max-w-[100px] object-contain">
                                        </div>
                                    @endif

                                    <div class="flex-1">
                                        <label class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 cursor-pointer">
                                            <span>{{ $logo || $logoFile ? 'Cambiar logo' : 'Subir logo' }}</span>
                                            <input type="file" wire:model="logoFile" id="logoFile" class="sr-only" accept="image/*">
                                        </label>
                                    </div>
                                </div>
                                <div wire:loading wire:target="logoFile" class="text-sm text-gray-500 mt-1">Cargando...</div>
                                @error('logoFile') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mt-6 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                                {{ $provider_id ? 'Guardar cambios' : 'Crear proveedor' }}
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

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <!-- Mensaje Flash -->
            @if (session()->has('message'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('message') }}</p>
                </div>
            @endif

            <!-- Cabecera -->
            <div class="flex justify-between mb-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Gestión de Galería
                </h2>
                <button wire:click="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Agregar imagen
                </button>
            </div>

            <!-- Modal para agregar/editar imágenes -->
            @if($isOpen)
                <div class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="absolute inset-0 bg-gray-900 opacity-75"></div>

                    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-10 max-h-[90vh] flex flex-col">
                        <div class="px-6 py-4 border-b">
                            <div class="text-lg font-medium text-gray-900">
                                {{ $isEdit ? 'Editar imagen' : 'Agregar nueva imagen' }}
                            </div>
                        </div>

                        <div class="px-6 py-4 overflow-y-auto flex-1">
                            <form wire:submit.prevent="store">
                                <div class="mb-4">
                                    <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                                    <input type="text" wire:model="titulo" id="titulo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('titulo') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                                    <textarea wire:model="descripcion" id="descripcion" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                    @error('descripcion') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2">Categoría:</label>
                                    <select wire:model="categoria" id="categoria" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="">Seleccione una categoría</option>
                                        <option value="empresa">Empresa</option>
                                        <option value="servicios">Servicios</option>
                                        <option value="local">Local</option>
                                        <option value="evento">Evento</option>
                                    </select>
                                    @error('categoria') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                                    <input type="file" wire:model="imagen" id="imagen" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <div wire:loading wire:target="imagen" class="mt-2 text-sm text-blue-500">Cargando imagen...</div>
                                    @error('imagen') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror

                                    @if ($url && $isEdit && !$imagen)
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500 mb-1">Imagen actual:</p>
                                            <img src="{{ $url }}" alt="Imagen actual" class="h-32 object-cover rounded">
                                        </div>
                                    @endif

                                    @if ($imagen)
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500 mb-1">Vista previa:</p>
                                            <img src="{{ $imagen->temporaryUrl() }}" alt="Vista previa" class="h-32 object-cover rounded">
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t flex justify-end">
                            <button type="button" wire:click="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Cancelar
                            </button>
                            <button type="button" wire:click="store()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ $isEdit ? 'Actualizar' : 'Guardar' }}
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Galería de imágenes -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($images as $image)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ $image->url }}" alt="{{ $image->titulo }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $image->titulo }}</h3>
                                <span class="px-2 py-1 text-xs rounded-full {{
                                    $image->categoria == 'empresa' ? 'bg-blue-100 text-blue-800' :
                                    ($image->categoria == 'servicios' ? 'bg-green-100 text-green-800' :
                                    ($image->categoria == 'local' ? 'bg-purple-100 text-purple-800' :
                                    'bg-yellow-100 text-yellow-800'))
                                }}">
                                    {{ ucfirst($image->categoria) }}
                                </span>
                            </div>
                            <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ $image->descripcion }}</p>
                            <div class="mt-4 flex justify-end space-x-2">
                                <button wire:click="edit({{ $image->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">
                                    Editar
                                </button>
                                <button wire:click="delete({{ $image->id }})" onclick="return confirm('¿Estás seguro de eliminar esta imagen?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">No hay imágenes en la galería. Agrega una nueva imagen para comenzar.</p>
                    </div>
                @endforelse
            </div>

            <!-- Paginación -->
            <div class="mt-6">
                {{ $images->links() }}
            </div>
        </div>
    </div>
</div>

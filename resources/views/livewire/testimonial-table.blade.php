<!-- filepath: c:\Users\Developer\Documents\misproyectos\conexioneschavez\resources\views\livewire\testimonial-table.blade.php -->
<div class="w-full">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($testimonials as $testimonial)
            <div class="bg-white/10 backdrop-blur-sm border border-yellow-500/20 rounded-lg shadow-xl overflow-hidden hover:transform hover:scale-[1.02] transition-all duration-300">
                @if ($testimonial->imagen)
                    <img src="{{ asset('storage/' . $testimonial->imagen)  }}" alt="{{ $testimonial->cliente }}" class="w-full h-48 object-contain bg-gray-800">
                @else
                    <div class="w-full h-48 bg-gray-800 flex items-center justify-center">
                        <span class="text-gray-400 text-xl"><i class="fas fa-quote-left"></i></span>
                    </div>
                @endif

                <div class="p-6">
                    <h3 class="text-xl font-bold text-yellow-400">{{ $testimonial->cliente }}</h3>
                    <h4 class="text-sm text-gray-300 mb-4">{{ $testimonial->empresa }}</h4>

                    <p class="text-gray-200 mb-4">
                        {{ \Illuminate\Support\Str::limit($testimonial->mensaje, 150) }}
                    </p>

                    <div class="mt-4 text-center">
                        <a href="{{ route('testimonials.show', $testimonial->id) }}" class="inline-block px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black font-medium rounded-md transition-colors duration-300">
                            Ver testimonio completo
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-10">
                <p class="text-center text-yellow-400 text-xl">No hay testimonios disponibles actualmente.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $testimonials->links() }}
    </div>
</div>

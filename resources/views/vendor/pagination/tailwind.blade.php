@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-black/60 border border-gray-700 cursor-default rounded-md">
                    <i class="fas fa-chevron-left mr-2"></i> Anterior
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-black/60 border border-gray-700 rounded-md hover:bg-yellow-500 hover:text-black transition-colors">
                    <i class="fas fa-chevron-left mr-2"></i> Anterior
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-white bg-black/60 border border-gray-700 rounded-md hover:bg-yellow-500 hover:text-black transition-colors">
                    Siguiente <i class="fas fa-chevron-right ml-2"></i>
                </button>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-black/60 border border-gray-700 cursor-default rounded-md">
                    Siguiente <i class="fas fa-chevron-right ml-2"></i>
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-white">
                    Mostrando
                    <span class="font-medium text-yellow-500">{{ $paginator->firstItem() }}</span>
                    a
                    <span class="font-medium text-yellow-500">{{ $paginator->lastItem() }}</span>
                    de
                    <span class="font-medium text-yellow-500">{{ $paginator->total() }}</span>
                    resultados
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-black/70 border border-gray-700 cursor-default rounded-l-md" aria-hidden="true">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        </span>
                    @else
                        <button wire:click="previousPage" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-white bg-black/70 border border-gray-700 rounded-l-md hover:bg-yellow-500 hover:text-black transition-colors" aria-label="{{ __('pagination.previous') }}">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-black/70 border border-gray-700 cursor-default">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-black bg-yellow-500 border border-yellow-500 cursor-default">{{ $page }}</span>
                                    </span>
                                @else
                                    <button wire:click="gotoPage({{ $page }})" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-black/70 border border-gray-700 hover:bg-yellow-500 hover:text-black transition-colors" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-white bg-black/70 border border-gray-700 rounded-r-md hover:bg-yellow-500 hover:text-black transition-colors" aria-label="{{ __('pagination.next') }}">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-black/70 border border-gray-700 cursor-default rounded-r-md" aria-hidden="true">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif

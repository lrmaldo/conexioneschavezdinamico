@props([
    'size' => 'w-6 h-6',
    'stroke' => 'currentColor',
    'fill' => 'none',
    'strokeWidth' => '2',
    'class' => '',
])

<svg xmlns="http://www.w3.org/2000/svg"
    {{ $attributes->merge(['class' => "$size $class"]) }}
    viewBox="0 0 24 24"
    fill="{{ $fill }}"
    stroke="{{ $stroke }}"
    stroke-width="{{ $strokeWidth }}"
    stroke-linecap="round"
    stroke-linejoin="round">
    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
</svg>

@props([
    'size' => 'w-6 h-6',
    'color' => 'currentColor',
    'class' => '',
    'strokeWidth' => 1.5,
])

<svg xmlns="http://www.w3.org/2000/svg"
    {{ $attributes->merge(['class' => "$size $class"]) }}
    fill="none"
    viewBox="0 0 24 24"
    stroke="{{ $color }}"
    stroke-width="{{ $strokeWidth }}"
    stroke-linecap="round"
    stroke-linejoin="round"
    aria-hidden="true">
    <path d="M1 3h15v13H1z" />
    <path d="M16 8h4l3 3v5h-7V8z" />
    <circle cx="5.5" cy="18.5" r="2.5" />
    <circle cx="18.5" cy="18.5" r="2.5" />
</svg>

@props([
    'size' => 'md',
    'class' => '',
])

@php
    $sizes = [
        'xs' => 'w-3 h-3',
        'sm' => 'w-4 h-4',
        'md' => 'w-5 h-5',
        'lg' => 'w-6 h-6',
        'xl' => 'w-7 h-7',
    ];

    $sizeClasses = isset($sizes[$size]) ? $sizes[$size] : $sizes['md'];
@endphp

<svg xmlns="http://www.w3.org/2000/svg"
    {{ $attributes->merge(['class' => $sizeClasses . ' ' . $class]) }}
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    stroke-linecap="round"
    stroke-linejoin="round">
    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
    <circle cx="8.5" cy="8.5" r="1.5" />
    <polyline points="21 15 16 10 5 21" />
</svg>

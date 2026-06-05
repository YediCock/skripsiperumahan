@props(['active' => false])

@php
    $classes = ($active ?? false) ? 'active menu' : 'menu';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</li>

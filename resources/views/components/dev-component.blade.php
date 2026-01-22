@props(['action', 'icon' => null, 'text' => null])

@php
    if (!$icon) {
        $icon = match ($action) {
            'edit' => 'pencil-square',
            'view' => 'eye',
            'delete' => 'trash',
            'create' => 'plus-circle',
        };
    }
@endphp

@php
    $class = match ($action) {
        'create' => 'txt-sky-600',
        'delete' => 'txt-red-600',
        'edit' => 'txt-orange-600',
        'view' => 'txt-gray-600',
    };
@endphp

<button type="button" {{ $attributes->class([$class, 'action-button']) }}>
    <x-gt-icon name="{{ $icon }}" class="wh-1" />
    @if ($text != '' || $slot->isNotEmpty())
        <span class="ml-025 font-semibold">{{ $slot->isNotEmpty() ? $slot : ($text != '' ? $text : '') }}</span>
    @endif
</button>

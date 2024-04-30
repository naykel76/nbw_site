@php
    $icons = [
        'info' => 'information-circle',
        'warning' => 'exclamation-circle',
        'danger' => 'exclamation-triangle',
    ];
@endphp

<div class="bx {{ $type }}-light bdr-3 rounded-1 flex va-c">


    <svg class="icon wh-4 fs0 mr-2">
        <use xlink:href="/svg/naykel-ui.svg#{{ $icons[$type] }}"></use>
    </svg>
    <div>
        @if (isset($title))
            <div class="bx-title">{{ $title }}</div>
        @endif
        <div>{{ $slot }}</div>
    </div>
</div>

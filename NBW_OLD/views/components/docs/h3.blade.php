@isset($title)
    <h3 id="{{ $snake = str()->snake($title) }}">{{ $title }}</h3>
@endisset

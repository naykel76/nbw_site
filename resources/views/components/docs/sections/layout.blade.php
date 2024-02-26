@props(['title', 'withContainer' => false])

<section {{ $attributes->merge(['class' => 'my md:my-5']) }}>

    @if ($withContainer)
        <div class="container">
    @endif

    @isset($title)
        <h2 id="{{ $snake = str()->snake($title) }}">{{ $title }}</h2>
    @endisset

    {{ $slot }}

    @if ($withContainer)
        </div>
    @endif

</section>

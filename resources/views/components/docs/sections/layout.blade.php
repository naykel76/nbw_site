@props(['title'])

<section {{ $attributes->merge(['class' => 'my md:my-5']) }}>

    @isset($title)
        <h2 id="{{ $snake = str()->snake($title) }}">{{ $title }}</h2>
    @endisset

    {{ $slot }}

</section>

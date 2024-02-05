@props(['title'])

<section {{ $attributes->merge(['class' => 'my md:my-5']) }}>

    <h2 id="{{ $snake = str()->snake($title) }}">{{ $title }}</h2>

    {{ $slot }}

</section>

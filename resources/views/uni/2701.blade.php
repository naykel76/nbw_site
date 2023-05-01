<x-gotime-app-layout layout="{{ config('naykel.template') }}" hasContainer class="py-5-3-2">

    <h1>Data For 2701 Mobile App</h1>

    @push('styles')

        <style>
            pre {
                white-space: pre-wrap;
            }

        </style>
    @endpush

    <h2>Venue Data</h2>
    <pre> {{ json_encode($venues) }} </pre>

    <hr>

    <h2>Beer Data</h2>
    <pre> {{ json_encode($beers) }} </pre>

    <hr>

    <h2>My Beers Data</h2>
    <pre> {{ json_encode($myBeers) }} </pre>

    <h2>Beer Venues Data</h2>
    <pre> {{ json_encode($myBeerVenues) }} </pre>


</x-gotime-app-layout>

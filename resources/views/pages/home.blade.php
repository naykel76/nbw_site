<x-gotime-app-layout layout="{{ config('naykel.template') }}" hasContainer class="py-5-3-2">

    <h1>{{ $title ?? null }}</h1>

    <a href="{{ route('linux.things-you-should-know') }}">Things You Should Know about Linux to Have a Fighting Chance</a>

</x-gotime-app-layout>

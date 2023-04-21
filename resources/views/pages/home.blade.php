<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="py-5-3-2 container maxw-lg">

    <h1>{{ $title ?? null }}</h1>

    <p class="bx warning-light lead">Disclaimer: All content on this website is my interpretation of the concepts we are taught at university, (as well as many we are not). As much as I would like to think I have everything right I can not guarantee it, so do yourself a favour and research for yourself.</p>

    <hr>

    <a href="{{ route('linux.things-you-should-know') }}">Things You Should Know about Linux to Have a Fighting Chance</a>

    <section class="py-5-3-2">
        <div class="container">
            <x-gt-menu filename="nav-programming" class="flex wrap gg" itemClass="btn secondary outline px-2" withIcons iconClass="h-2" />
            <hr>
        </div>
    </section>


    {{-- <div class="wh-10 blue flex ha-c va-c">
        <div class="wh-3 orange"></div>
    </div> --}}

</x-gotime-app-layout>

<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="py-5-3-2-2 container maxw-lg">

    <h1>{{ $title ?? null }}</h1>




    <p class="bx warning-light lead">Disclaimer: All content on this website is my interpretation of the concepts we are taught at university, (as well as many we are not). As much as I would like to think I have everything right I can not guarantee it, so do yourself a favour and research for yourself.</p>

    <hr>

    {{-- <a href="{{ route('linux.things-you-should-know') }}">Things You Should Know about Linux to Have a Fighting Chance</a> --}}

    <section class="px">
        <x-gt-menu filename="nav-programming" class="flex wrap gg" itemClass="btn secondary outline px-2" withIcons />
    </section>
    <hr>
    <section class="px">
        <h2>Ionic</h2>
        <x-gt-menu filename="nav-programming" menuname="Ionic" class="flex wrap gg" itemClass="btn secondary outline px-2" withIcons />
    </section>
    <hr>
    <section class="px space-y">
        <h2>Laravel</h2>
        <x-gt-menu filename="nav-laravel" menuname="General" class="flex wrap gg" itemClass="btn secondary outline px-2" withIcons />
        <h4>Tips, Techniques and Code Examples</h4>
        <x-gt-menu filename="nav-laravel" menuname="Cheatsheets" class="flex wrap gg" itemClass="btn secondary outline px-2" withIcons />
    </section>
    <hr>
    <section class="px space-y">
        <h2>Linux</h2>
        <x-gt-menu filename="nav-linux" menuname="main" class="flex wrap gg" itemClass="btn secondary outline px-2" withIcons />
    </section>
    <hr>
    <section class="px">
        <h2>Misc</h2>
        <x-gt-menu filename="nav-programming" menuname="other" class="flex wrap gg" itemClass="btn secondary outline px-2" withIcons />
    </section>



</x-gotime-app-layout>

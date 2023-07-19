<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="py-5-3-2-2 container maxw-lg ">

    <h1>{{ $title ?? null }}</h1>

    {{-- Don't reinvent the wheel. -- Anthony J. D'Angelo --}}

    {{-- Without reinventing the wheel there wouldn't be fast cars. -- Nathan Watts --}}

    <p class="bx warning-light lead">Disclaimer: All content on this website is my interpretation of the concepts we are taught at university, (as well as many we are not). As much as I would like to think I have everything right I can not guarantee it, so do yourself a favour and research for yourself.</p>
    <hr>

    <section class="px space-y">
        <x-gt-menu filename="nav-programming" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
        <hr>
        <h2>Concepts, Tips, Techniques and Code Examples</h2>
        <x-gt-menu filename="nav-concepts" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
        <hr>
        <h2>Ionic</h2>
        <x-gt-menu filename="nav-programming" menuname="Ionic" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
        <hr>
        <h2>Linux</h2>
        <x-gt-menu filename="nav-linux" menuname="main" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
        <div class="grid md:cols-2">
            <div class="bx flex va-c">

                <x-gt-icon-linux class="icon wh-4 mr" />
                <a href="{{ route('linux.things-you-should-know') }}" class="txt-lg lh-1">Things you should know about linux to have a fighting chance</a>
            </div>
        </div>
        <hr>
        <h2>Misc</h2>
        <x-gt-menu filename="nav-programming" menuname="other" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
    </section>

    <div class="container maxw-md mt-5">
        <h2 class="title">Notes that need a home</h2>
        <x-gt-parsedown path="{{ 'notes-to-put-somewhere' }}" />
    </div>

</x-gotime-app-layout>

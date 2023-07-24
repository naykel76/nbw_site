<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="zebra c-py-5-3-2">

    {{-- <section>
        <div class="container maxw-lg">
            <p class="bx warning-light lead"><strong>Disclaimer:</strong> All content on this website is my interpretation of the concepts we are taught at university, (as well as many we are not). As much as I would like to think I have everything right I can not guarantee it, so do yourself a favour and research for yourself.</p>
        </div>
    </section> --}}

    <section class="dark">

        <div class="container maxw-lg grid-5 cols-2 va-c">

            <div>
                <img src="/images/wooden-sports-car1.jpg" class="bdrr" alt="wooden sports car">
            </div>

            <blockquote>
                <p class="txt-2">"Without reinventing the wheel we wouldn't have fast cars."</p>
                <p class="lead">-- <em>Nathan Watts</em></p>
            </blockquote>

        </div>

    </section>

    <section>
        <div class="container">
            <h2>General Cheatsheets and Quick Reference</h2>
            <x-gt-menu filename="nav-programming" class="flex wrap gg-1" itemClass="btn secondary" withIcons />
        </div>
    </section>

    <section>
        <div class="container">
            <h2>Concepts, Tips, and Techniques</h2>
            <x-gt-menu filename="nav-concepts" class="flex wrap gg-1" itemClass="btn secondary" withIcons />
        </div>
    </section>

    <section>
        <div class="container">
            <h2>Linux</h2>
            <x-gt-menu filename="nav-linux" menuname="main" class="flex wrap gg-1" itemClass="btn secondary" withIcons />
            <div class="grid md:cols-2 mt">
                <div class="bx flex va-c">
                    <x-gt-icon-linux class="icon wh-5 mr" />
                    <x-gt-menu filename="nav-linux" menuname="other" class="flex wrap gg-1" itemClass="btn secondary" />
                </div>
            </div>
            <hr>
            <h2>Misc</h2>
            <x-gt-menu filename="nav-programming" menuname="other" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
        </div>
    </section>

    <section>
        <div class="container maxw-md mt-5">
            <h2 class="title">Notes that need a home</h2>
            <x-gt-parsedown path="{{ 'notes-to-put-somewhere' }}" />
        </div>
    </section>


</x-gotime-app-layout>

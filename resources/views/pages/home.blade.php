<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="c-py-5-3-2">

    <section class="relative overflow-x-clip">
        <img src="/svg/blur-red.svg" class="absolute z-bottom" style="left:-10%; bottom: -240px; ">
        <img src="/svg/blur-pink.svg" class="absolute z-bottom" style="left: 10%; bottom: -440px; ">
        <img src="/svg/blur-yellow.svg" class="absolute z-bottom" style="right: -20%; top: -120%; ">

        <div class="container">
            <div class="txt-xl">Hi, my name is</div>
            <div class="txt-4 fw7">Nathan Watts</div>
            <div class="maxw-sm">
                I design and develop Laravel web applications, dabble in server management and am training to become a full stack developer.
            </div>
        </div>
    </section>

    <section class="relative overflow-x-clip">

        <img src="/svg/blur-pink.svg" class="absolute z-bottom" style=" right:-5%; bottom: -340px; ">

        <div class="container">
            <h2>Cheatsheets and Quick Reference</h2>
            <x-gt-menu filename="nav-programming" class="grid icon-grid"
                itemClass="btn py-1 secondary flex-col txt-lg"
                withIcons iconClass="h-3 mb-05 max-icon-width" />
        </div>

    </section>

    <section>
        <div class="container">
            <h2>Concepts, Tips, and Techniques</h2>
            <x-gt-menu filename="nav-concepts" class="flex wrap gg-1" itemClass="btn secondary" withIcons>
            </x-gt-menu>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>Additional Resources</h2>
            <x-gt-menu menuname="resources" class="flex wrap gg-1"
                itemClass="btn flex-col txt-lg"
                iconClass="wh-3" withIcons newWindow>
            </x-gt-menu>
        </div>
    </section>

    <section class="relative diagonal py-10">

        <img src="/svg/blur-red.svg" class="absolute z-bottom" style="left:-5%; bottom: -240px; ">

        <div class="fp-x container maxw-lg grid va-c">

            <img src="/images/wooden-sports-car1.jpg" class="bdrr" alt="wooden sports car">

            <blockquote>
                <p class="txt- x">"Without reinventing the wheel we wouldn't have fast cars."</p>
                <p class="lead">-- <em>Nathan Watts</em></p>
            </blockquote>

        </div>

    </section>


    {{-- <section class="flex wrap py-1 va-c ha-c">
        <img src="/svg/blur-red.svg" class="wh-2 animate-pulse-slow">
        <img style="animation-duration: 4s" src="/svg/blur-pink.svg" class="wh-4 animate-pulse-slow">
        <img style="animation-duration: 5s" src="/svg/blur-green.svg" class="wh-6 animate-pulse-slow">
        <img style="animation-duration: 6s" src="/svg/blur-blue.svg" class="wh-8 animate-pulse-slow">
        <img style="animation-duration: 7s" src="/svg/blur-yellow.svg" class="wh-10 animate-pulse-slow">
        <img style="animation-duration: 7s" src="/svg/blur-red.svg" class="wh-10 animate-pulse-slow">
        <img style="animation-duration: 6s" src="/svg/blur-pink.svg" class="wh-8 animate-pulse-slow">
        <img style="animation-duration: 5s" src="/svg/blur-green.svg" class="wh-6 animate-pulse-slow">
        <img style="animation-duration: 4s" src="/svg/blur-blue.svg" class="wh-4 animate-pulse-slow">
        <img  src="/svg/blur-yellow.svg" class="wh-2 animate-pulse-slow">
    </section> --}}
    <section class="flex space-between wrap px py-3 va-c ha-c">
        <img src="/svg/blur-red.svg" class="wh-2 animate-pulse-slow">
        <img style="animation-duration: 4s" src="/svg/blur-pink.svg" class="wh-3 animate-pulse-slow">
        <img style="animation-duration: 5s" src="/svg/blur-green.svg" class="wh-4 animate-pulse-slow">
        <img style="animation-duration: 6s" src="/svg/blur-blue.svg" class="wh-5 animate-pulse-slow">
        <img style="animation-duration: 7s" src="/svg/blur-yellow.svg" class="wh-6 animate-pulse-slow">
        <img style="animation-duration: 7s" src="/svg/blur-red.svg" class="wh-6 animate-pulse-slow">
        <img style="animation-duration: 6s" src="/svg/blur-pink.svg" class="wh-5 animate-pulse-slow">
        <img style="animation-duration: 5s" src="/svg/blur-green.svg" class="wh-4 animate-pulse-slow">
        <img style="animation-duration: 4s" src="/svg/blur-blue.svg" class="wh-3 animate-pulse-slow">
        <img src="/svg/blur-yellow.svg" class="wh-2 animate-pulse-slow">
    </section>

    {{--
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
    </section> --}}

    <section>
        <div class="container maxw-md mt-5">
            <h2 class="title">Notes that need a home</h2>
            <x-gt-parsedown path="{{ 'notes-to-put-somewhere' }}" />
        </div>
    </section>


</x-gotime-app-layout>

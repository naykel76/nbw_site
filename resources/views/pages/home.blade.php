<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="c-py-5-3-2">

    <section class="relative overflow-x-clip">
        <img src="/svg/blur-red.svg" class="absolute z-bottom" style="left:-10%; bottom: -240px; ">
        <img src="/svg/blur-pink.svg" class="absolute z-bottom" style="left: 10%; bottom: -440px; ">
        <img src="/svg/blur-yellow.svg" class="absolute z-bottom" style="right: -20%; top: -120%; ">
        <div class="container">
            <div class="grid cols-2 ha-t">
                <div>
                    <div class="txt-xl">Hi, my name is</div>
                    <div class="txt-4 fw7">Nathan Watts</div>
                    <div class="maxw-sm">
                        I design and develop Laravel web applications, dabble in server management and am training to become a full stack developer.
                    </div>
                </div>
                <div class="bx warning-light">
                    <small>
                        <div class="bx-title">Disclaimer:</div>
                        <p class="txt-sm" style="opacity: 0.9"> Everything you find on this website is my take on concepts we are taught at university, a seemingly endless supply of YouTube tutorials with a sprinkle of the wild ideas that invade my brain. While I'd love to claim infallibility, I can't promise that. So, do yourself a favour and check for yourself. Trust me, Google is your friend! </p>
                        <p class="txt-sm"> Oh, and fair warning, don't be surprised if you encounter a bit of chaos and missing pieces here and there - after all, it's all part of the journey.</p>
                    </small>
                </div>
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
            <x-gt-menu menuname="resources" class="grid icon-grid"
                itemClass="btn flex-col txt-lg"
                iconClass="h-3 mb-05 max-icon-width" withIcons newWindow>
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

    <section>
        <div class="container maxw-md mt-5">
            <h2 class="title">Notes that need a home</h2>
            <x-gt-parsedown path="{{ 'notes-to-put-somewhere' }}" />
        </div>
    </section>


</x-gotime-app-layout>

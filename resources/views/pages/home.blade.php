<x-layouts.app :title="$title ?? null" class="py-5-3-2-2">
    <div class="container">
        <div class="container mt">
            <h2>Centering with css</h2>
            <div class="flex gap">
                <div class="flex va-c ha-c wh-8 bx">
                    <div class="wh-2 pink"></div>
                </div>
                <div class="flex wh-8 bx" style="height: 200px;">
                    <div class="mxy-auto wh-2 pink"></div>
                </div>
                <div class="grid wh-8 bx">
                    <div class="place-self-center wh-2 pink"></div>
                </div>
            </div>
        </div>
    </div>
    <section class="flex justify-between container mt-3">
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
</x-layouts.app>

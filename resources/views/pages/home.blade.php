<x-gt-app-layout layout="{{ config('naykel.template') }}">
    <section class="relative overflow-x-clip py-2 md:py-5">
        <img src="/svg/blur-red.svg" class="absolute z-bottom" style="left:-10%; bottom: -240px; ">
        <img src="/svg/blur-pink.svg" class="absolute z-bottom" style="left: 10%; bottom: -440px; ">
        <img src="/svg/blur-yellow.svg" class="absolute z-bottom" style="right: -20%; top: -120%; ">
        <div class="container">
            <div class="grid lg:cols-2 ha-t">
                <div class="space-y-1">
                    <div class="txt-xl">Hi, my name is</div>
                    <div class="txt-4 fw7 lh-1">Nathan Watts</div>
                    <div class="maxw-md lead"> I design and develop Laravel web applications, dabble in server management and am training to become a full stack developer. </div>
                </div>
                <div class="bx warning-light bdr-3 rounded-1 txt-sm to-lg:hidden">
                    <p><strong class="txt-red">Heads Up!</strong> This website is a mash up of notes from uni, a seemingly endless supply of YouTube tutorials, and a sprinkle of the wild ideas that invade my brain. While I'd love to claim perfection, I can't promise that. So, do yourself a favour and check for yourself.</p>
                    <p> Oh, and fair warning, don't be surprised if you encounter a bit of chaos and missing pieces here and there - after all, it's all part of the journey.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="relative overflow-x-clip py-2 md:py-4" style="background-color: rgba(0,0,0,0.1)">
        <img src="/svg/blur-pink.svg" class="absolute z-bottom" style=" right:-5%; bottom: -340px; ">
        <div class="container">
            <h2>Cheatsheets and Quick Reference</h2>
            <x-gt-menu filename="nav-programming" layout="icon-grid" />
        </div>
    </section>
    <section class="py-3" style="background-color: rgba(0,0,0,0.2)">
        <div class="container">
            <div class="grid-3 md:cols-2">
                <div>
                    <img src="/images/griffith-westpack-hackathon-2024-team-pacman.jpg" alt="griffith-westpack-hackathon-2024-team-pacman" class="rounded-2">
                    <div class="txt-xs tac space-x-025">
                        <span>From Left:</span>
                        <span>Nathan Watts,</span>
                        <span>Wangzhi (Owen) Xing,</span>
                        <span>Prof Alan Wee-Chung Liew (Head of School), </span>
                        <span>Derek Qui,</span>
                        <span>Siqi (Percy) Wu,</span>
                        <span>Maisi Hao</span>
                    </div>
                </div>
                <div>
                    <h2>Team "PacMan" wins 1st place at the Westpac Hackathon 2024!</h2>
                    <p>Competing against hundreds of students from UQ, QUT, and Griffith University, our project "Gesture Recognition and VR Banking Application" secured the top spot for best idea and solution.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-2 md:py-4">
        <div class="container">
            <h2>Concepts, Tips, and Techniques</h2>
            <x-gt-menu filename="nav-concepts" class="flex wrap gap-1" itemClass="btn secondary" />
            <h2>Programming Fundamentals and Techniques</h2>
            <div class="maxw-md my">
                <p>Solutions to common programming challenges across various languages and frameworks.</p>
                <p>Think of them as ultimate cheat sheets, with the task taking center stage and the code playing a supporting role to provide a quick reference for common programming tasks and techniques.</p>
            </div>
            <x-gt-menu filename="nav-fundamentals-and-techniques" class="flex wrap gap-1" itemClass="btn secondary" />
            <h4>Database</h4>
            <x-gt-menu filename="nav-fundamentals-and-techniques" menuname="database" class="flex wrap gap-1" itemClass="btn secondary" />
            <h2>Additional Resources</h2>
            <x-gt-menu menuname="resources" layout="icon-grid" />
        </div>
    </section>
    <section class="relative diagonal z-bottom md:py-4">
        <img src="/svg/blur-red.svg" class="absolute z-bottom" style="left:-5%; bottom: -240px; ">
        <div class="container grid md:cols-2 md:gap-4 va-c py-2 md:py-4">
            <div class="maxw-ms">
                <img src="/images/wooden-sports-car1.jpg" class="rounded" alt="wooden sports car">
            </div>
            <blockquote>
                <p class="txt-2 x">"Without reinventing the wheel we wouldn't have fast cars."</p>
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
</x-gt-app-layout>

<x-gt-app-layout layout="{{ config('gotime.template') }}" class="py-5-3-2-2">

    {{-- <x-gt-sidebar /> --}}

    {{-- @php
        $width = 'w-20';
    @endphp
    <div x-data="{ open: true }">
        <!-- Toggle -->
        <button class="btn primary" x-on:click="open = ! open">
            <span x-text="open ? 'Click to Close' : 'Click to Open'"></span>
        </button>

        <!-- Backdrop -->
        <div x-show="open" x-on:click="open = !open" class="overlay"></div>

        <!-- Sidebar -->
        <aside x-show="open" class="sidebar top-0 left-0 z-40 h-screen transition-transform -translate-x-full {{ $width }}">
            <div class="h-full overflow-y-auto bg-sky-700">
                <div class="flex va-c space-between pxy-05 bdr-b">
                    <div class="flex va-c">
                        <img src="{{ asset('favicon.svg') }}" alt="{{ config('app.name') }}">
                        <div class="txt-lg fw7 ml-1">NAYKEL</div>
                    </div>
                    <button x-on:click="open = ! open" type="button" class="btn dark pxy-025">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div>
                </div>
            </div>
        </aside>
    </div> --}}

    <div class="container">
        {{-- <livewire:form-examples-and-testing /> --}}
    </div>

    <section>
        <div class="container-sm">

            <div class="bx info-light bdr-3">
                <div class="bx-title">Current Task</div>
                <div class="lead">
                    finish off multi select and add to IBLCE
                </div>
            </div>
        </div>
    </section>

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
            </div>
        </div>
    </section>
    <section class="relative overflow-x-clip py-2 md:py-4" style="background-color: rgba(0,0,0,0.1)">
        <img src="/svg/blur-pink.svg" class="absolute z-bottom" style=" right:-5%; bottom: -340px; ">
        <div class="container">
            <h2>Cheat Sheets and Quick Reference</h2>
            <x-gt-menu filename="nav-programming" />
        </div>
    </section>
    {{-- 
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
                    <p>Competing against hundreds of students from UQ, QUT, and Griffith University, our project "Gesture Recognition and VR Banking Application" secured the top spot for best idea and
                        solution.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-2 md:py-4">
        <div class="container">
            <h2>Software Engineering Concepts, Tips, and Techniques</h2>
            <x-gt-menu filename="nav-software-engineering" class="flex wrap gap-1" itemClass="btn secondary" />
            <h2>Programming Fundamentals and Techniques</h2>
            <div class="maxw-md my">
                <p>Solutions to common programming challenges across various languages and frameworks.</p>
                <p>Think of them as ultimate cheat sheets, with the task taking center stage and the code playing a supporting role to provide a quick reference for common programming tasks and
                    techniques.</p>
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
 --}}

    <livewire:user-profile-form />

    <div class="container-sm">
        <livewire:gotime.components.choices />
    </div>

    @push('styles')
        <style>
            hr {
                border: none;
                margin: 0;
                padding: 0;
                display: block;
                width: 100%;
            }

            hr.gradient {
                height: 2px;
                background: linear-gradient(to right, #eee, #3a3939, #eee);
            }

            hr.dashed {
                border-top: 2px dashed #ccc;
            }

            hr.shadow {
                height: 1px;
                background-color: #ccc;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
        </style>
    @endpush

    <div class="container space-y-3">
        <hr class="a">
        <hr class="b">
        <hr class="gradient">
        <hr class="dashed">
        <hr class="shadow">
    </div>

    <div class="c-py-5-3-2-2">

        <div class="bx">
            <a href="" class="btn">
                <x-gt-icon name="chevron-double-left" class="wh-1 mr-05" />
                <span>Previous</span>
            </a>

            <x-gt-button text="text" icon="download" />
        </div>

        <div class="container flex space-between items-start">
            <div class="flex space-x">




                <div class="relative" x-data="{ open: false }">

                    <div x-on:click="open = ! open" class="relative flex-centered flex-col icon-button secondary withState bdr-0">
                        {{-- <x-gt-icon name="{{ $icon }}" /> --}}
                        {{-- <div class="mt-025 lh-1 to-lg:hidden">{{ $text }}</div> --}}
                    </div>

                    <div x-show="open" x-transition x-cloak
                        x-on:click.outside="open = false" x-on:mouseleave="open = false"
                        class="absolute right-0 w-16 pxy-0 z-100 mt-025">


                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="container-sm">
                {{-- <x-payit-payment-options type="stripe-elements" /> --}}
                {{-- <x-payit-stripe-elements /> --}}
            </div>
        </section>
    </div>
    </div>
    <div class="txt-pink">sdfsdf</div>
    <x-gt-table>
        <x-slot:thead>
            <tr>

                <x-gt-table.th sortable> title </x-gt-table.th>

                <th class="txt-xs"> Product name </th>
                <th class="txt-xs"> Color </th>
                <th class="txt-xs"> Category </th>
                <th class="txt-xs"> Price </th>
                <th class="txt-xs"> Action </th>
            </tr>
        </x-slot:thead>
        <x-slot:tbody>
            <tr>
                <td> Apple MacBook Pro 17" </td>
                <td> Silver </td>
                <td> Laptop </td>
                <td> $2999 </td>
                <td> <a href="#">Edit</a> </td>
            </tr>
            <tr class="bdr-green bdr5">
                <td> Microsoft Surface Pro </td>
                <td> White </td>
                <td> Laptop PC </td>
                <td> $1999 </td>
                <td> <a href="#">Edit</a> </td>
            </tr>
            <tr>
                <td> Magic Mouse 2 </td>
                <td> Black </td>
                <td> Accessories </td>
                <td> $99 </td>
                <td> <a href="#">Edit</a> </td>
            </tr>
        </x-slot:tbody>
    </x-gt-table>



    <button class="rounded-md bdr-2 bdr-dotted bdr-indigo-500 bg-white pxy text-gray-700">Button A</button>
    <button class="rounded-md bdr-dotted bdr-indigo-500 bg-white pxy text-gray-700">Button A</button>

    <div class="rounded-025 inline-flex items-center fw6 bg-green-100 txt-gray-600 bdr-red-200 txt-xs px-05 py-025">
        Draft
    </div>
    <h4>How do I set the layout for a full page livewire component?</h4>
    <p>Set the <code>layout</code> when using the <code>Renderable</code> trait</p>

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

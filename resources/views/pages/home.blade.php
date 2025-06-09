<x-gt-app-layout layout="{{ config('gotime.template') }}" hasContainer class="py-5-3-2-2">

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
                        class="absolute pos-r w-16 pxy-0 z-100 mt-025">


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


        <section>
            <div class="container">
                <h2 class="mb-05 mt-2">Page Header</h2>
            </div>
            <header class="py">
                <div class="container flex space-between gap-2">
                    <div class="logo">
                        <div class="to-md:hidden py-2 pink tac w-18">Large Logo</div>
                        <div class="md:hidden py-1 blue tac w-12">Small Logo</div>
                    </div>
                    <div class="to-md:hidden py-2 pink tac fg1">
                        <div>Button/Actions/Content</div>
                    </div>
                    <div class="md:hidden pxy-1 blue tac">
                        <div>Menu</div>
                    </div>
                </div>
            </header>
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

</x-gt-app-layout>

<x-gotime-app-layout layout="docs" hasContainer class="markdown py-5-3-2">

    <x-slot name="navigation">

        @if(empty($data['menus']))

            <p class="bx warning mr-1 tac">No Menus to display. <br> Maybe you should get onto that!</p>

        @else

            @foreach($data['menus'] as $menu)

                <h2>{{ $menu }}</h2>

                <x-gt-menu menuname="{{ $menu }}" filename="{{ $data['navFileName'] }}" class="menu" />

            @endforeach

        @endif

    </x-slot>

    @if(!empty($data['type']))

        @include($data['path'])

    @elseif(!empty($data['path']))

        <x-gt-parsedown dir="views/" path="{{ $data['path'] }}" />

    @endif

</x-gotime-app-layout>

{{-- This is the same as docs-default but without the hs separator --}}
<x-gotime-app-layout layout="docs" hasContainer class="markdown py-5-3-2-2">

    <x-slot name="navigation">

        @if(empty($data['menus']))

            <p class="bx warning mr-1 tac">No Menus to display. <br> Maybe you should get onto that!</p>

        @else

            <div class="space-y-2">
                @foreach($data['menus'] as $menu)
                    <x-gt-menu menuname="{{ $menu }}" filename="{{ $data['filename'] }}" class="menu txt-sm" title="{{ $menu }}" />
                @endforeach
            </div>

        @endif

    </x-slot>

    @if(!empty($data['type']))

        @include($data['path'])

    @elseif(!empty($data['path']))

        <x-gt-parsedown dir="views/" path="{{ $data['path'] }}" />

    @endif

</x-gotime-app-layout>

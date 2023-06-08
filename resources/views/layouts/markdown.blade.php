<x-gotime-app-layout layout="{{ config('naykel.template') }}" hasContainer class="markdown py-5-3-2-2">

    {{-- this is just a lazy way to make the docs readable --}}
    <div class="maxw-800 mx-auto">
        <x-gotime-parsedown dir="views/" path="{{ $data['path'] }}" />
    </div>

</x-gotime-app-layout>

<x-gotime-app-layout layout="{{ config('naykel.template') }}" hasContainer class="markdown">

    {{-- this is just a lazy way to make the docs readable --}}
    <div class="maxw-md mx-auto">
        <x-gt-parsedown path="{{ $data['path'] }}" />
    </div>

</x-gotime-app-layout>

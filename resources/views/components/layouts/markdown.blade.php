<x-gt-app-layout layout="{{ config('naykel.template') }}" pageTitle="Markdown Page" class="container py-2">
    {{-- DON'T ADD ANY OPINIONATED STYLING HERE --}}
    <x-gt-markdown path="{{ resource_path('views/' . $data['path']) }}" />
</x-gt-app-layout>

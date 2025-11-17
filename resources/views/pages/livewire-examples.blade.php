<x-gt-layouts.app layout="{{ config('naykel.template') }}" :$pageTitle class="container py-2">

   <h1>{{ $pageTitle ?? null }}</h1>

   <p>In this example, the form is nested inside the table component as a child component.</p>
   <livewire:example-table />

</x-gt-layouts.app>
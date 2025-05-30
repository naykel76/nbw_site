@push('head')
    <meta name="robots" content="noindex,follow">
@endpush

<x-gt-app-layout layout="base" :$pageTitle class="nk-admin relative">
    @includeFirst(['components.layouts.partials.navbar', 'gotime::components.layouts.partials.navbar'])
    <main class="nk-main flex">
        <aside class="bdr-r py bg-gray-50 minw-20">
            {{-- @includeFirst(['components.layouts.partials.admin-nav', 'gotime::components.layouts.partials.admin-nav']) --}}
        </aside>
        <div {{ $attributes->class(['container py-2']) }}>
            {{ $slot }}
        </div>
    </main>
</x-gt-app-layout>



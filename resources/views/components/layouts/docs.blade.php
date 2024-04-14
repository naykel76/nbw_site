@props(['mainClasses', 'hasAside' => true])

<x-gt-app-layout layout="base" :$pageTitle>

    @includeFirst(['components.layouts.partials.navbar', 'gotime::components.layouts.partials.navbar'])

    @isset($top)
        {{ $top }}
    @endisset

    <main {{ $attributes->class(['nk-main container py-2 md:py-5', $hasAside ? 'flex gap-5' : '']) }}>

        @isset($navigation)
            <aside class="w-18 fs0" {{ $navigation->attributes }}>
                {{ $navigation }}
            </aside>
        @endisset

        {{-- style="min-width: 0; is to prevent the code blocks overflowing because flexbox is being a dick! --}}
        <div class="fg1" style="min-width: 0;">
            {{ $slot }}
            {{-- <x-gt-markdown /> --}}
        </div>

    </main>

    @isset($bottom)
        {{ $bottom }}
    @endisset

    @includeFirst(['components.layouts.partials.footer', 'gotime::components.layouts.partials.footer'])

</x-gt-app-layout>
{{-- 

    @php
        if(!isset($navigation)){
            $hasAside = false;
        }
    @endphp

    @if (class_exists(\Naykel\Devit\DevitServiceProvider::class))
        @includeIf('devit::components.dev-toolbar')
    @else
        @if (config('authit.allow_register') && Route::has('login'))
            @includeFirst(['components.layouts.partials.top-toolbar', 'gotime::components.layouts.partials.top-toolbar'])
        @endif
    @endif







<x-gt-app-layout> --}}

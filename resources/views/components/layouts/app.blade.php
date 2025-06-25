<x-gt-app-layout layout="base" :$pageTitle>

    @if (class_exists(\Naykel\Devit\DevitServiceProvider::class))
        @includeIf('devit::components.dev-toolbar')
    @else
        @if (config('authit.allow_register') && Route::has('login'))
            @includeFirst(['components.layouts.partials.top-toolbar', 'gotime::components.layouts.partials.top-toolbar'])
        @endif
    @endif

    <div class="navbar">
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ config('gotime.logo.path') }}" alt="{{ config('app.name') }}"></a>
            </div>

            <div class="flex va-c to-md:hidden">
                <x-gt-menu layout="hover" class="gap-1" itemClass="nav-item rounded-05" />
            </div>
        </div>
        {{-- <div class="md:hidden mxy-0"> --}}
            <x-gt-sidebar layout="burger-button-main" />
        {{-- </div> --}}
    </div>
    {{-- @includeFirst(['components.layouts.partials.navbar', 'gotime::components.layouts.partials.navbar']) --}}

    @isset($top)
        {{ $top }}
    @endisset

    @includeFirst(['components.layouts.partials.main', 'gotime::components.layouts.partials.main'])

    @isset($bottom)
        {{ $bottom }}
    @endisset

    @includeFirst(['components.layouts.partials.footer', 'gotime::components.layouts.partials.footer'])

</x-gt-app-layout>

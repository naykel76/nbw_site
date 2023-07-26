{{-- --------------- BEFORE YOU DO ANYTHING CRAZY -------------
DO NOT remove the container from this layout. If you don't want
the container then publish the layout locally and override. --}}

<div class="navbar">

    <div class="container">

        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ config('naykel.logo.path') }}" alt="{{ config('app.name') }}"
                    height="{{ config('naykel.logo.height') }}" width="{{ config('naykel.logo.width') }}"></a>
        </div>

        <div class="flex va-c to-md:hide">
            {{-- <x-gt-menu layout="hover" class="gg-1" itemClass="nav-item rounded-05">
                <li>
                    <a href="https://github.com/naykel76/" target="_blank">
                        <x-gt-icon-github class="icon txt-muted" />
                    </a>
                </li>
            </x-gt-menu> --}}
            <x-gt-menu layout="hover" class="gg-1" itemClass="nav-item rounded-05" />
            <div class="ml">

                <a href="https://github.com/naykel76/" target="_blank">
                    <x-gt-icon-github class="icon txt-muted" />
                </a>
            </div>
        </div>

    </div>

    <div class="md:hide mxy-0">
        <x-gt-sidebar layout="burger-button-main" />
    </div>

</div>

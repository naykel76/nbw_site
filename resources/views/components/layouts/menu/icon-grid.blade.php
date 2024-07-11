<nav>
    <ul class="grid flexible-grid-150">
        @foreach ($menuItems as $item)
            <li>
                <a href="{{ url($item->url) }}" class="btn py-1 secondary flex-col txt-lg">
                    @if ($item->icon)
                        <svg class="h-3 mb-05">
                            <use href="/svg/naykel-logos.svg#{{ $item->icon }}"></use>
                        </svg>
                    @endif
                    {{ $item->name }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>

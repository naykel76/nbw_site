<h1>Menu</h1>

<p>Use anchor to keep styles consistant</p>

<div class="grid cols-2-2-1">
    <nav class="menu bdr">
        <div><a href="#">Home</a></div>
        <div x-data="{ open: true }">
            <div x-on:click="open = !open">
                <a href="#" class="space-between">
                    Products
                    <x-gt-icon-caret-down x-cloak x-show="!open" />
                    <x-gt-icon-caret-up x-cloak x-show="open" />
                </a>
            </div>
            <div x-show="open" class="pl" x-transition>
                <a href="#">Electronics</a>
                <a href="#">Clothing and Apparel</a>
                <a href="#">Beauty and Personal Care</a>
                <a href="#">Home Goods</a>
                <a href="#">Food and Beverages</a>
            </div>
        </div>
        <div x-data="{ open: false }">
            <div x-on:click="open = !open">
                <a href="#" class="space-between">
                    Services
                    <x-gt-icon-caret-down x-cloak x-show="!open" />
                    <x-gt-icon-caret-up x-cloak x-show="open" />
                </a>
            </div>
            <div x-show="open" class="pl" x-transition>
                <a href="#">Accounting and Bookkeeping</a>
                <a href="#">Web Design and Development</a>
                <a href="#">IT Support and Technology</a>
            </div>
        </div>
        <div><a href="#">About</a></div>
        <div><a href="#">Contact</a></div>
    </nav>
    <nav class="menu dark">
        <div><a href="#">Home</a></div>
        <div x-data="{ open: true }">
            <div x-on:click="open = !open">
                <a href="#" class="space-between">
                    Products
                    <x-gt-icon-caret-down x-cloak x-show="!open" />
                    <x-gt-icon-caret-up x-cloak x-show="open" />
                </a>
            </div>
            <div x-show="open" class="pl" x-transition>
                <a href="#">Electronics</a>
                <a href="#">Clothing and Apparel</a>
                <a href="#">Beauty and Personal Care</a>
                <a href="#">Home Goods</a>
                <a href="#">Food and Beverages</a>
            </div>
        </div>
        <div x-data="{ open: false }">
            <div x-on:click="open = !open">
                <a href="#" class="space-between">
                    Services
                    <x-gt-icon-caret-down x-cloak x-show="!open" />
                    <x-gt-icon-caret-up x-cloak x-show="open" />
                </a>
            </div>
            <div x-show="open" class="pl" x-transition>
                <a href="#">Accounting and Bookkeeping</a>
                <a href="#">Web Design and Development</a>
                <a href="#">IT Support and Technology</a>
            </div>
        </div>
        <div><a href="#">About</a></div>
        <div><a href="#">Contact</a></div>
    </nav>
</div>

<x-gt-markdown class="-ml-3">
    @verbatim
        ```
        <nav class="menu">
            <div><a href="#"> ... </a></div>
            <div x-data="{ open: true }">
                <!-- parent item (toggle) -->
                <div x-on:click="open = !open">
                    <a href="#" class="space-between">
                        Products
                        <x-gt-icon-caret-down x-cloak x-show="!open" />
                        <x-gt-icon-caret-up x-cloak x-show="open" />
                    </a>
                </div>
                <!-- child items -->
                <div x-show="open" class="pl" x-transition>
                    <div><a href="#"> ... </a></div>
                </div>
            </div>
        </nav>
    @endverbatim
</x-gt-markdown>


<h1>Sidebar</h1>

<div x-cloak x-data="{ open: false }" @keydown.escape.window="open = false">

    <button class="btn pxy-05" x-on:click="open = true">Open Sidebar</button>

    <div x-show="open" class="overlay"></div>

    <div class="sidebar transition w-20 blue"
        :class="{'-translate-x-full opacity-0':open === false, 'translate-x-0 opacity-100': open === true}">

        <div class="pxy">
            <div class="flex space-between">
                <div>Sidebar</div>
                <button x-on:click="open = false" type="button" class="btn dark pxy-025">
                    <svg class="icon" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>


        <nav class="menu">
            <div><a href="#">Menu Item</a></div>
            <div>
                <a href="#"> Parent with collapsed items </a>
                <div class="pl">
                    <a href="#">Item one</a>
                    <a href="#">Item two</a>
                    <a href="#">Item three</a>
                </div>
            </div>
            <div>
                <a href="#"> Parent click to collapse <x-gt-icon-user></x-gt-icon-user> </a>
                <div class="pl">
                    <a href="#">Item one</a>
                    <a href="#">Item two</a>
                    <a href="#">Item three</a>
                </div>
            </div>

            <div>
                <a href="#"> Services </a>
                <div class="pl">
                    <a href="#">Accounting and Bookkeeping</a>
                    <a href="#">Web Design and Development</a>
                    <a href="#">IT Support and Technology</a>
                </div>
            </div>
            <div><a href="#">About</a></div>
            <div><a href="#">Contact</a></div>
        </nav>

    </div>

</div>

<div class="bx info my">This component requires Alpine JS.</div>

<h2>Basic Markup</h2>

<x-gt-markdown class="-ml-3">
    @verbatim
        ```
        <div x-data="{ open: false }" @keydown.escape.window="open = false">
            <!-- open sidebar button -->
            <button class="btn" type="button" x-on:click="open = true">Open Sidebar</button>
            <!-- optional overlay -->
            <div x-show="open" class="overlay"></div>
            <!-- sidebar -->
            <div class="sidebar transition w-20 blue"
                :class="{'-translate-x-full opacity-0':open === false, 'translate-x-0 opacity-100': open === true}">
                <!-- close sidebar button -->
                <button class="btn" type="button" x-on:click="open = false">Open Sidebar</button>
                <!-- content -->
            </div>
        </div>
    @endverbatim
</x-gt-markdown>


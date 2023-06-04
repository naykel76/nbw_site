<x-gotime-app-layout layout="page-examples" class="pxy-0">

    <div class="banner flex va-c dark" style="background-image: url(http://pf.site/storage/content/agribusiness-finance.jpg);">
        <div class="container maxw-lg">
            <h1>Banner with css background-image</h1>
            <p>This banner has a css background image that is positioned to the right. </p>
            <ul>
                <li>Add the <code>banner</code> class to apply basic styles</li>
                <li>Background image is a fixed width and positioned to the right</li>
                <li>Text will slide over the image as required so make sure the text is readable</li>
                <li>Not well suited for extra wide screens because the image will sit far off to the side. </li>
            </ul>
        </div>
    </section>

    <x-markdown class="-ml-3">
        @verbatim
            ```
            <section class="banner dark" style="background-image: url(http://pf.site/storage/content/agribusiness-finance.jpg);">
                <div class="container maxw-lg">

                </div>
            </section>
        @endverbatim
    </x-markdown>
    <hr>

    <div class="banner blue flex va-c" style="background-image: url(/images/colour-smoke-870x400.jpg)">

        <div class="container maxw-lg px-2 txt-white">
            <h1>Super Awesome Page Title</h1>
            <div class="banner-text flex mt-2">
                <ul class="list-tick txt-lg">
                    <li> Experience the difference, unlock your potential </li>
                    <li> Your one-stop shop for all things awesome </li>
                    <li> Discover the world of possibilities </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="txt-red mxy-auto py maxw-600">This example uses the <code>list-tick</code> class on the list items. With the exception icon colour, styles can be overriden using utility classes. This is because the image colours is set in the data:image so the is no magice way to change it!
    </div>
    <hr class="mx-10">
    <div class="banner flex va-c dark" style="background-image: url(/images/colour-smoke-870x400.jpg)">

        <div class="container maxw-lg px-2 txt-white">

            <h1>Super Awesome Page Title</h1>

            <div class="flex mt-2">
                <x-sample.headline-list />
            </div>

        </div>

    </div>

    <div class="container tac">
        <p>Banner layout for site page where content is created and managed from the administration panel.</p>
    </div>


    <section class="blue">

        <div class="container">

            {{-- <div class="grid gg-0 cols-50_60_60_60 va-c"> --}}
            <div class="grid gg-0 cols-60:40 va-c">

                <div class="space-y py-3 md:pr-3">
                    {{-- {{ $content }} --}}
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio voluptate aliquid similique impedit veniam cum! Accusantium deleniti a porro culpa.
                </div>

                <div class="pxy">
                    {{-- {{ $image }} --}}
                    <img class="rounded-1" src="/images/samples/sign-paper-612x408.jpg" alt="sign paper work">
                </div>

            </div>

        </div>

    </section>





</x-gotime-app-layout>

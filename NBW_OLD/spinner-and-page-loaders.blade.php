<h1>Spinner and Page Loaders</h1>

<x-toc></x-toc>

<section>

    <h2 id="spinner">Spinner</h2>

    <p>Add any JTB <code>txt-*</code> class to set the spinner color</p>

    <x-gt-spinner />
    <x-gt-spinner class="txt-red" />
    <x-gt-spinner class="txt-green" />
    <x-gt-spinner class="txt-blue" />

    <x-gt-markdown class="-ml-6">
        @verbatim
            ```
            <x-gt-spinner />
            <x-gt-spinner class="txt-red" />
            <x-gt-spinner class="txt-green" />
            <x-gt-spinner class="txt-blue" />
        @endverbatim
    </x-gt-markdown>

    <h3 id="spinner-size">Define the size</h3>

    <p class="mb">You can modify the spinner's size by adding the <code>size</code> attribute and defining its value. Be aware that the size is determined using a JTB 'wh-' size class, and this size is expressed in <code>rem</code> units.</p>

    <x-gt-spinner size="4" />
    <x-gt-spinner size="5" />

    <x-gt-markdown class="-ml-6">
        @verbatim
            ```
            <x-gt-spinner size="3" />
            <x-gt-spinner size="5" />
        @endverbatim
    </x-gt-markdown>

</section>

# Display and Visibility

<p class="lead">Utilities for controlling the display and visibility an element.</p>

<!-- TOC -->

- [Screen Readers](#screen-readers)

<!-- /TOC -->

<div class="bx">
    <p class="my">Display the element 'from' the device.</p>
    <div class="sm:block bg-yellow-1"><code>sm:block</code> {576+}</div>
    <div class="md:blockbg-yellow-3"><code>block-from-md</code> {768+}</div>
    <div class="lg:block bg-yellow-5"><code>lg:block</code> {992+}</div>
    <div class="block-from-xl bg-yellow-7"><code>block-from-xl</code> {1200+}</div>
    <div class="block-from-xxl bg-yellow-9"><code>block-from-xxl</code> {1600+}</div>
    <hr>
    <p class="my">Display the element 'on' the device only.</p>
    <div class="on-sm:block bg-yellow-1"><code>on-sm:block</code> {576 - 767}</div>
    <div class="on-md:block bg-yellow-3"><code>on-md:block</code> {768 - 991}</div>
    <div class="on-lg:block bg-yellow-5"><code>on-lg:block</code> {992 - 1199}</div>
    <div class="on-xl:block bg-yellow-7"><code>on-xl:block</code> {1200 - 1599}</div>
    <div class="on-xxl:block bg-yellow-9"><code>on-xxl:block</code> {1600+}</div>
    <p class="my">Display the element up 'to' (not-including) the device.</p>
    <div class="to-sm:block bg-yellow-1"><code>to-sm:block</code> {767-}</div>
    <div class="to-md:block bg-yellow-3"><code>to-md:block</code> {991-}</div>
    <div class="to-lg:block bg-yellow-5"><code>to-lg:block</code> {1199-}</div>
    <div class="to-xl:block bg-yellow-7"><code>to-xl:block</code> {1599-}</div>
</div>

<div class="bx">
    <p class="my">Hide the element 'from' the device.</p>
    <div class="sm:hide bg-yellow-1"><code>sm:hide</code> {576+}</div>
    <div class="md:hide bg-yellow-3"><code>md:hide</code> {768+}</div>
    <div class="lg:hide bg-yellow-5"><code>lg:hide</code> {992+}</div>
    <div class="xl:hide bg-yellow-7"><code>xl:hide</code> {1200+}</div>
    <div class="xxl:hide bg-yellow-9"><code>xxl:hide</code> {1600+}</div>
    <hr>
    <p class="my">Hide the element 'on' the device only.</p>
    <div class="on-sm:hide bg-yellow-1"><code>on-sm:hide</code> {576 - 767}</div>
    <div class="on-md:hide bg-yellow-3"><code>on-md:hide</code> {768 - 991}</div>
    <div class="on-lg:hide bg-yellow-5"><code>on-lg:hide</code> {992 - 1199}</div>
    <div class="on-xl:hide bg-yellow-7"><code>on-xl:hide</code> {1200 - 1599}</div>
    <div class="on-xxl:hide bg-yellow-9"><code>on-xxl:hide</code> {1600+}</div>
    <p class="my">Hide the element up 'to' (not-including) the device.</p>
    <div class="to-sm:hide bg-yellow-1"><code>to-sm:hide</code> {767-}</div>
    <div class="to-md:hide bg-yellow-3"><code>to-md:hide</code> {991-}</div>
    <div class="to-lg:hide bg-yellow-5"><code>to-lg:hide</code> {1199-}</div>
    <div class="to-xl:hide bg-yellow-7"><code>to-xl:hide</code> {1599-}</div>
</div>

<a id="markdown-screen-readers" name="screen-readers"></a>

## Screen Readers

Use `sr-only` to hide an element visually without hiding it from screen readers:

Example Usage: This class could be sued to move the checkbox offscreen to create a custom toggle switch or file selector.

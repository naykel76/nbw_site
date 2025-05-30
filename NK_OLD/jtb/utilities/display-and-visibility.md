# Responsive Display and Visibility (WIP)

<p class="lead">Utilities for controlling the display and visibility an element.</p>

- [Introduction](#introduction)
- [Display/Hide 'on' screen size](#displayhide-on-screen-size)
- [Toggle visibility using the 'to' and 'from' hide classes](#toggle-visibility-using-the-to-and-from-hide-classes)
- [Screen Readers](#screen-readers)


## Introduction

## Display/Hide 'on' screen size

On specific screen sizes, hide the pink box and show the blue box. On all other screen sizes, both boxes should be visible.

`on-{device}:hidden` and `on-{device}:{display}`

<div class="grid cols-5 tac my">
    <div>
        <div class="py px-025 pink on-sm:hidden"><code class="txt-sm txt-white">on-sm:hidden</code></div>
        <div class="py px-025 blue on-sm:block"><code class="txt-sm txt-white">on-sm:block</code></div>
    </div>
    <div>
        <div class="py px-025 pink on-md:hidden"><code class="txt-sm txt-white">on-md:hidden</code></div>
        <div class="py px-025 blue on-md:block"><code class="txt-sm txt-white">on-md:block</code></div>
    </div>
    <div>
        <div class="py px-025 pink on-lg:hidden"><code class="txt-sm txt-white">on-lg:hidden</code></div>
        <div class="py px-025 blue on-lg:block"><code class="txt-sm txt-white">on-lg:block</code></div>
    </div>
    <div>
        <div class="py px-025 pink on-xl:hidden"><code class="txt-sm txt-white">on-xl:hidden</code></div>
        <div class="py px-025 blue on-xl:block"><code class="txt-sm txt-white">on-xl:block</code></div>
    </div>
    <div>
        <div class="py px-025 pink on-xxl:hidden"><code class="txt-sm txt-white">on-xxl:hidden</code></div>
        <div class="py px-025 blue on-xxl:block"><code class="txt-sm txt-white">on-xxl:block</code></div>
    </div>
</div>


## Toggle visibility using the 'to' and 'from' hide classes

<div class="grid cols-5 tac">
    <div>
        <div class="py px-025 pink sm:hidden"><code class="txt-sm txt-white">sm:hidden</code></div>
        <div class="py px-025 blue to-sm:hidden"><code class="txt-sm txt-white">to-sm:hidden</code></div>
    </div>
    <div>
        <div class="py px-025 pink md:hidden"><code class="txt-sm txt-white">md:hidden</code></div>
        <div class="py px-025 blue to-md:hidden"><code class="txt-sm txt-white">to-md:hidden</code></div>
    </div>
    <div>
        <div class="py px-025 pink lg:hidden"><code class="txt-sm txt-white">lg:hidden</code></div>
        <div class="py px-025 blue to-lg:hidden"><code class="txt-sm txt-white">to-lg:hidden</code></div>
    </div>
    <div>
        <div class="py px-025 pink xl:hidden"><code class="txt-sm txt-white">xl:hidden</code></div>
        <div class="py px-025 blue to-xl:hidden"><code class="txt-sm txt-white">to-xl:hidden</code></div>
    </div>
    <div>
        <div class="py px-025 pink xxl:hidden"><code class="txt-sm txt-white">xxl:hidden</code></div>
        <div class="py px-025 blue hidden on-xxl:block"><code class="txt-sm txt-white">on-xxl:block</code></div>
    </div>
</div>


```html
<div>
    <div class="lg:hidden"> </div>
    <div class="to-lg:hidden"> </div>
</div>
```


## Screen Readers

Use `sr-only` to hide an element visually without hiding it from screen readers:

Example Usage: This class could be sued to move the checkbox offscreen to create a custom toggle switch or file selector.


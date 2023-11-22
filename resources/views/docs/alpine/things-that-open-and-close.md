# Snippets for Things That Open and Close

<!-- TOC -->

- [Toggle onclick using x-show](#toggle-onclick-using-x-show)
- [How to manage the closing](#how-to-manage-the-closing)
    - [`click.outside`](#clickoutside)
- [Attach event listener](#attach-event-listener)
- [](#)
    - [Toggle using css classes](#toggle-using-css-classes)

<!-- /TOC -->

<a id="markdown-toggle-onclick-using-x-show" name="toggle-onclick-using-x-show"></a>

## Toggle onclick using x-show

<div x-data="{ open: false }">
    <button class="btn" x-on:click="open = ! open">Toggle</button>
    <div x-show="open" x-on:click.outside="open = false">
        Hey there!
    </div>
</div>

```html
<div x-data="{ open: false }">
    <button class="btn" x-on:click="open = ! open">Toggle</button>
    <div x-show="open" x-on:click.outside="open = false">
        Hey there!
    </div>
</div>
```

<div class="bx info flex va-c">
    <svg class="icon wh-4 fs0 mr-2"> <use xlink:href="/svg/naykel-ui.svg#info"></use> </svg>
    <p>You can use a combination of events to open and close elements.</p>
</div>

```html
<div x-on:click="open = !open" x-on:mouseenter="open = true">Toggle</div>
```
---

<a id="markdown-how-to-manage-the-closing" name="how-to-manage-the-closing"></a>

## How to manage the closing

<a id="markdown-clickoutside" name="clickoutside"></a>

### `click.outside`

<a id="markdown-attach-event-listener" name="attach-event-listener"></a>

## Attach event listener


<!-- <button x-data @click="$dispatch('actionDelete')">Emit actionDelete event</button>

<div x-data="modal" @action-delete.camel.window="toggle()">
   <div x-show="open">Modal is open</div>
   <div x-show="!open">Modal is hidden</div>
</div>


<script>
document.addEventListener("alpine:init", () => {
    Alpine.data("modal", (initialOpenState = false) => ({
        open: initialOpenState,

        toggle() {
            this.open = !this.open;
        },
    }));
});
</script> -->

<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

##
```html
<div class="relative" x-data="{open:false}" x-on:mouseenter="open=true" x-on:mouseleave="open=false">
    <div class="absolute mt-05 flex w-16 z-100" x-show="open" x-transition.duration style="display: none;">
        ...
    </div>
</div>
```


```html
<span x-data="{open:false}" x-on:mouseenter="open=true" x-on:mouseleave="open=false">
    <x-gt-icon-info class="txt-blue" />
    <div class="absolute mt-05 flex maxw-400px z-100 bx info pxy-05 " x-show="open" x-transition.duration style="display: none;">
        ...
    </div>
</span>
```




`x-transition` https://alpinejs.dev/directives/transition




<a id="markdown-toggle-using-css-classes" name="toggle-using-css-classes"></a>

### Toggle using css classes


Here's a simple example of a simple dropdown toggle, but instead of using `x-show,` we'll use a `hidden` class to toggle an element.

<div x-data="{ open: false }">
    <button class="btn" x-on:click="open = ! open">Toggle</button>
    <div :class="open ? '' : 'hidden'"> ... </div>
</div>

```html
<div x-data="{ open: false }">
    <button class="btn" x-on:click="open = ! open">Toggle</button>
    <div :class="open ? '' : 'hidden'"> ... </div>
</div>
```

```html
<div :class="show ? '' : 'hidden'">
<!-- Is equivalent to: -->
<div :class="show || 'hidden'">
```

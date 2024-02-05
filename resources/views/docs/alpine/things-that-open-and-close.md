# Snippets for Things That Open and Close

<!-- TOC -->

- [x-collapse](#x-collapse)
- [Accordion using `x-show`](#accordion-using-x-show)
    - [Single item accordion](#single-item-accordion)
    - [Multiple item accordion (single open)](#multiple-item-accordion-single-open)
- [Toggle onclick using x-show](#toggle-onclick-using-x-show)
- [How to manage the closing](#how-to-manage-the-closing)
    - [`click.outside`](#clickoutside)
- [Attach event listener](#attach-event-listener)
- [](#)
    - [Toggle using css classes](#toggle-using-css-classes)

<!-- /TOC -->

<a id="markdown-x-collapse" name="x-collapse"></a>

## x-collapse

This is similar to `x-show` but it allows you to expand and collapse elements using smooth
animations.

<div x-data="{ expanded: false }">
    <button class="btn" x-on:click.prevent="expanded = ! expanded">Toggle Content</button>
    <p class="my" x-show="expanded" x-collapse>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum odio eligendi error. Voluptate repellendus, omnis dicta, assumenda quisquam illo aperiam amet laboriosam excepturi quo tenetur, vero ducimus accusantium aliquid sed? </p>
</div>

```html
<div x-data="{ expanded: false }">
    <button class="btn" x-on:click.prevent="expanded = ! expanded">Toggle Content</button>
    <p class="my" x-show="expanded" x-collapse> ... </p>
</div>
```

<a id="markdown-accordion-using-x-show" name="accordion-using-x-show"></a>

## Accordion using `x-show`

<a id="markdown-single-item-accordion" name="single-item-accordion"></a>

### Single item accordion

<div x-data="{ expanded: false }">
    <button x-on:click="expanded =! expanded" class="btn accent w-10 mb-05">
        <span x-show="!expanded">Open</span>
        <span x-show="expanded">Close</span>
    </button>
    <div x-show="expanded">
        Hey there!
    </div>
</div>

```html
<div x-data="{ expanded: false }">
    <button x-on:click="expanded =! expanded" class="btn">
        <span x-show="!expanded">Open</span>
        <span x-show="expanded">Close</span>
    </button>
    <div x-show="expanded">
        Hey there!
    </div>
</div>
```

<a id="markdown-multiple-item-accordion-single-open" name="multiple-item-accordion-single-open"></a>

### Multiple item accordion (single open)

```html
<div x-data="{ active: 0, }" class="space-y">
    <div x-data="{
        id: 1,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null }
    }">
        <button x-on:click="expanded =! expanded"
            :aria-expanded="expanded" class="btn primary">
            <span x-show="!expanded">Open Item One</span>
            <span x-show="expanded">Close Item One</span>
        </button>
        <div x-show="expanded">
            Hey there!
        </div>
    </div>
    <div x-data="{
        id: 2,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null }
    }">
        <button x-on:click="expanded =! expanded"
            :aria-expanded="expanded" class="btn primary">
            <span x-show="!expanded">Open Item Two</span>
            <span x-show="expanded">Close Item Two</span>
        </button>
        <div x-show="expanded">
            Hey there!
        </div>
    </div>
</div>
```

<a id="markdown-toggle-onclick-using-x-show" name="toggle-onclick-using-x-show"></a>

## Toggle onclick using x-show

<div x-data="{Open false }">
    <button class="btn" x-on:click.prevent="open = ! open">Toggle</button>
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
    <svg class="icon wh-4 fs0 mr-2"> <use xlink:href="/svg/naykel-ui.svg#question-mark-circlermation-circle"></use> </svg>
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
    <div class="absolute mt-05 flex maxw-xs z-100 bx info pxy-05 " x-show="open" x-transition.duration style="display: none;">
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

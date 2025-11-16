# Things That Open and Close

- [Simple Toggle](#simple-toggle)
- [Transition and Styles](#transition-and-styles)
- [Additional Resources](#additional-resources)


## Simple Toggle

You can create a simple toggle using Alpine.js by binding a boolean variable to
the `x-show` directive. This variable will control the visibility of the content
that opens and closes.

```html +parse
<div class="flex space-x">
    <div x-data="{ open: false }">
        <!-- Button to toggle open state -->
        <button class="btn primary" x-on:click="open = ! open">
            <span x-text="open ? 'Click to Close' : 'Click to Open'"></span>
        </button>
        <!-- Element that opens and closes -->
        <div x-show="open">
            Hey there!
        </div>
    </div>
</div>
```

```html +code-blade
<div x-data="{ open: false }">
    <!-- Button to toggle open state -->
    <button class="btn primary" x-on:click="open = ! open">
        <span x-text="open ? 'Click to Close' : 'Click to Open'"></span>
    </button>
    <!-- Element that opens and closes -->
    <div x-show="open">
        ...
    </div>
</div>
```

---

## Transition and Styles

The simplest way to achieve a transition using Alpine is by adding
`x-transition` to an element with `x-show` on it. For example:

```html +parse
<div x-data="{ open: false }">
    <button class="btn primary" x-on:click="open = ! open">
        <span x-text="open ? 'Click to Close' : 'Click to Open'"></span>
    </button>
    <div x-show="open" x-transition >
        Hey there!
    </div>
</div>
```

```html +code-blade
<div x-data="{ open: false }">
    <button class="btn primary" x-on:click="open = ! open">
        <span x-text="open ? 'Click to Close' : 'Click to Open'"></span>
    </button>

    <div x-show="open" x-transition>
        ...
    </div>
</div>
```
<!-- 

Add Chevrons

```html +parse
<div x-data="{ open: false }">
    <button class="btn primary" x-on:click="open = ! open">
        <span x-text="open ? 'Click to Close' : 'Click to Open'"></span>
        <x-gt-icon name="chevron-down" class="wh-1" x-show="!open" />
        <x-gt-icon name="chevron-up" class="wh-1" x-show="open" />
    </button>
    <div x-show="open" x-transition >
        Hey there!
    </div>
</div>
```

```html +code-blade
<div class="flex space-x">
    <div x-data="{ open: false }">
        <button class="btn primary" x-on:click="open = ! open">
            <span x-text="open ? 'Click to Close' : 'Click to Open'"></span>
            @verbatim<x-gt-icon name="chevron-down" class="wh-1" x-show="!open" />
            <x-gt-icon name="chevron-up" class="wh-1" x-show="open" />@endverbatim
        </button>
        <div x-show="open" x-transition>
            ...
        </div>
    </div>
</div>
``` -->




---
<!-- 
## Hover to Open (REVIEW)


```html +parse-and-code
<div class="flex space-x">
    <div x-data="{ open: false }" x-on:mouseenter="open=true" x-on:mouseleave="open=false">
        <button class="btn primary" x-on:click="open = ! open">
            <span x-text="open ? 'Move Away' : 'Hover to Open'"></span>
        </button>
        <div x-show="open">
            Hey there!
        </div>
    </div>
</div>
```





Optionally, you can add `x-on:mouseenter` and `x-on:mouseleave`  attributes in the parent element to
switch the open state when hovering.

```html
<div x-data="{ open: false }" x-on:mouseenter="open=true" x-on:mouseleave="open=false">
    <button class="btn mb-05 w-10" x-on:click="open = ! open">
        <span x-text="open ? 'Move Away' : 'Hover to Open'"></span>
    </button>
    <div x-show="open">
        Hey there!
    </div>
</div>
``` -->

## Additional Resources
<a href="https://alpinejs.dev/directives/transition" target="blank">Alpine
Transition Docs</a>
# Alpine: Sharing state using `$wire.entangle`

- [What is `$wire.entangle`?](#what-is-wireentangle)
- [Why use `$wire.entangle`?](#why-use-wireentangle)
- [How to use `$wire.entangle`](#how-to-use-wireentangle)
- [How `$wire.entangle` works](#how-wireentangle-works)
    - [Direct use in `x-data`](#direct-use-in-x-data)
    - [In a custom Alpine component](#in-a-custom-alpine-component)
        - [The Problem](#the-problem)
        - [Solution](#solution)
- [Troubleshooting](#troubleshooting)
    - [Livewire is not syncing with the Alpine component?](#livewire-is-not-syncing-with-the-alpine-component)
- [Additional Resources](#additional-resources)


## What is `$wire.entangle`?

Livewire provides `$wire.entangle` to enable **two-way binding** between Alpine
and Livewire. This keeps both in sync — when Alpine updates a value, Livewire
sees it, and vice versa.

## Why use `$wire.entangle`?

When working with AlpineJS on the frontend and Livewire on the backend, you may
need interaction between the two. `$wire.entangle` enables you to bind Livewire
properties directly to AlpineJS state, creating a two-way connection. This
ensures that updates in Livewire are instantly reflected in Alpine, and changes
in Alpine are synced back to Livewire automatically.

Using `$wire.entangle` allows you to:

- **Share state** between Livewire and AlpineJS components.
- **Avoid full page reloads** when updating values.
- **Maintain reactivity** in your UI without complex workarounds.

## How to use `$wire.entangle`

```html +torchlight-html
<div x-data="{ open: $wire.entangle('showDropdown') }">
    <button x-on:click="open = false">Close</button>
    <div x-show="open"></div>
</div>
```

**Explanation**

* `x-data="{ open: $wire.entangle('showDropdown') }"` binds Alpine’s `open` to
  Livewire’s `showDropdown`.
* Any change in `open` updates `showDropdown`, and any Livewire update to
  `showDropdown` updates `open`.

---
<!-- NK this need to be tidied up to create a better flow -->
## How `$wire.entangle` works

When you call `$wire.entangle('property')`, it returns an **interceptor**
object. This allows Alpine to track and sync the value behind the scenes,
without breaking reactivity.

### Direct use in `x-data`

```html +torchlight-html
<div 
    x-data="{ values: $wire.entangle('hobbies') }" 
    x-init="console.log(values)"
> 
</div>
```

Console output:

```js +torchlight-js
Proxy(Array) {0: 'guitar', 1: 'gaming', 2: 'coding'}
```

* Alpine unwraps the entangled value automatically.
* You can access it directly using `values` in Alpine.

### In a custom Alpine component

#### The Problem

When using `$wire.entangle` inside a custom Alpine component, the value does not
behave as expected out of the box. Alpine does **not** automatically unwrap the
entangled value when passed as a parameter.


```html +torchlight-html
<div x-data="choices($wire.entangle('hobbies'))"> </div>
```

This causes issues because the value remains wrapped in an Alpine interceptor
object:

```js +torchlight-js
<script>
    window.addEventListener('alpine:init', () => {
        Alpine.data('choices', (value) => ({
            init() {
                console.log(value);
            },
        }));
    });
</script>
```

Console output:

```js +torchlight-js
{initialValue: Proxy(Array), _x_interceptor: true, initialize: ƒ}
```

#### Solution

Assign the incoming value to a named property inside your component to ensure
reactivity works as expected:

```js +torchlight-js
<script>
    window.addEventListener('alpine:init', () => {
        Alpine.data('choices', (value) => ({
            values: value,
            init() {
                console.log(this.values);
            }
        }));
    });
</script>
```

Now the console output is as expected:

```js +torchlight-js
Proxy(Array) {0: 'guitar', 1: 'gaming', 2: 'coding'}
```

**Why this works**: Although Alpine wraps entangled values with an interceptor,
assigning it to a local property (`values`) allows Alpine to manage it like any
reactive data. Use `this.values` to read or update the value inside your
component.

## Troubleshooting

### Livewire is not syncing with the Alpine component?

Ensure `wire:model` is applied to the input. If you're using a Blade component,
include `{{ $attributes }}` in your markup so Livewire can apply its bindings.

## Additional Resources

- <a href="https://livewire.laravel.com/docs/alpine#sharing-state-using-wireentangle" target="blank">Livewire Docs:
  Entangle</a>
* [AlpineJS Docs](https://alpinejs.dev)
* [Alpine & Livewire Interop
  Overview](https://laravel-livewire.com/docs/alpine-js)

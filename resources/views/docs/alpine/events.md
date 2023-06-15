# Events

<!-- TOC -->

- [Dispatching to other components](#dispatching-to-other-components)
    - [Dispatch event to update value](#dispatch-event-to-update-value)
    - [Dispatch event to open and close](#dispatch-event-to-open-and-close)
- [x-on DOM Events](#x-on-dom-events)
        - [`x-ref` with single object defined in `script`](#x-ref-with-single-object-defined-in-script)

<!-- /TOC -->
<a id="markdown-dispatching-to-other-components" name="dispatching-to-other-components"></a>

## Dispatching to other components

<a id="markdown-dispatch-event-to-update-value" name="dispatch-event-to-update-value"></a>

### Dispatch event to update value

```html
<div x-data="{ title: 'Hello' }" @set-title.window="title = $event.detail" >
    <h1 x-text="title"></h1>
</div>

<div x-data>
    <button @click="$dispatch('set-title', 'Hello World!')">Click me</button>
</div>
```

<a id="markdown-dispatch-event-to-open-and-close" name="dispatch-event-to-open-and-close"></a>

### Dispatch event to open and close

```html
<div x-data>
    <button x-on:click="$dispatch('toggle-sidebar', true)" class="btn">Click to open</button>
    <button x-on:click="$dispatch('toggle-sidebar', false)" class="btn">Click to close</button>
</div>

<div x-data="{ open: false }" @toggle-sidebar.window="open = $event.detail">
    <div :class="open ? '' : 'hidden'"> ... </div>
</div>
```

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

<a id="markdown-x-on-dom-events" name="x-on-dom-events"></a>

## x-on DOM Events

`x-on:click.window` listening for a click event anywhere in the window then set `show = true`

```html
<div x-data="{ show: false }" x-on:click.window="show = true;" x-show="show">
    ...
</div>
```

`x-on:my-event.window` listining for an emitted event called 'my-event' then set `show = true`

<div x-data="{ show: false }" x-on:my-event.window="show = true" x-show="show">
    ...
</div>


Livewire allows you to fire browser window events using `dispatchBrowserEvent()` function.

```php
$this->dispatchBrowserEvent('my-event', 'Notification message!');
```

**Q. how can an event be dispatched using vanilla javascript?**

---

<a id="markdown-x-ref-with-single-object-defined-in-script" name="x-ref-with-single-object-defined-in-script"></a>

#### `x-ref` with single object defined in `script`

    <div x-data="employee" class="space-y-0 my">
        <p x-text="name"></p>
        <p x-text="email"></p>
        <p x-text="age"></p>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('employee', () => ({
                name: 'John Doe',
                email: 'john@example.com',
                age: '25',
            }));
        });
    </script>



    {{-- listen for the event --}}
    <button class="btn" x-on:click="$dispatch('stuff')">...</button>
    <div x-data @stuff="alert('Button Was Clicked!')">

        {{-- dispatch the event --}}
        <button class="btn" x-on:click="$dispatch('stuff')">...</button>
    </div>

    <button x-data x-on:click="$dispatch('toggleSidebar')">Emit toggleSidebar event</button>

    <div x-data="sidebar" @toggle-sidebar.camel.window="toggle()">
        <div x-show="open">open</div>
        <div x-show="!open">hidden</div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("sidebar", (initialOpenState = false) => ({
                open: initialOpenState,
                toggle() {
                    this.open = !this.open;
                },
            }));
        });

    </script>

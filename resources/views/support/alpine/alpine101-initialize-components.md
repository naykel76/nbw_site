# Initialising AlpineJS with `x-data`

- [Introduction](#introduction)
- [Key Alpine Directives](#key-alpine-directives)
- [Inline Example](#inline-example)
- [Reusable Components (External Script)](#reusable-components-external-script)
    - [Step 1: Initialise AlpineJS](#step-1-initialise-alpinejs)
    - [Step 2: Define the Component](#step-2-define-the-component)
    - [Step 3: Use the Component in HTML](#step-3-use-the-component-in-html)
    - [TLDR](#tldr)
- [Additional Resources](#additional-resources)

## Introduction

AlpineJS components are initialised using the `x-data` directive, which defines
the **data** and **methods** available to the component.

You can define `x-data` inline for simple use cases, or register reusable
components using `Alpine.data()` via the `alpine:init` event.

## Key Alpine Directives

* `x-data` – Declares component data and methods
* `x-init` – Executes code when the component loads
* `x-text` – Outputs text to the DOM
* `x-model` – Binds input fields for two-way data binding

## Inline Example

```html +parse-and-code
<div x-data="{
        name: '', 
        setName(name) { this.name = name },
        greeting() { return `Hello, ${this.name}` }
    }"
    x-init="
        setName('Mike');
        console.log(greeting());
    "
>
    <span x-text="greeting"></span>
    <input x-model="name" placeholder="Enter your name" />
</div>
```

**Explanation**

- `x-data`: Defines the component's state (`name`) and methods (`setName`, `greeting`).
- `x-init`: Runs `setName('Mike')` to initialize `name` and logs the greeting to the console.
- `x-text="greeting"`: Displays the result of the `greeting()` method.
- `x-model="name"`: Binds the input field to `name`, enabling two-way data binding.

## Reusable Components (External Script)

Use an external script for reusable or more complex component logic. Define your
component in a script tag and register it using the `alpine:init` event.

### Step 1: Initialise AlpineJS

Use `window.addEventListener('alpine:init', ...)` to wait for Alpine to be fully
loaded before registering custom components. This ensures that Alpine is
available when your component is defined.

```html +torchlight-html
<script>
    window.addEventListener('alpine:init', function() {
        // We'll define custom components here later
    });
</script>
```

### Step 2: Define the Component

Register your component using `Alpine.data()` inside the `alpine:init` event
listener. 

Next, define a basic component called `greet` with a `name` property, a
`setName` method, and a `greeting` method.

```html +parse-and-code-js
<script>
    window.addEventListener('alpine:init', function() {
        Alpine.data('greet', () => ({
            name: '',
            setName(name) {
                this.name = name;
            }
            greeting() {
                return `Hello, ${this.name}`;
            }
        }));
    });
</script>
```

### Step 3: Use the Component in HTML

Now that the component is defined, use it in your HTML. The `x-data` directive
links the HTML to the component. Use `x-init` to set initial values or run
methods when the component is initialised.

<!-- What about passing initial values? Then initialise in the component -->

<!-- i dont think this is correct! no need fo init??? -->
```html +parse-and-code
<div x-data="greet" x-init="setName('Mike')">
    <span x-text="`Hello, ${name}!`"></span>
    <input x-model="name" placeholder="Enter your name" />
</div>
```

### TLDR

* Use `window.addEventListener('alpine:init', ...)` to register components after Alpine is loaded
* Define components with `Alpine.data('name', () => ({ ... }))` inside that event
* Use `x-data="name"` on elements to link to your component
* Use `x-init` to run setup code like setting initial values
* Use `x-model` to bind inputs to component state
* Use methods or getters in the component for computed values like greetings

<!-- 
<div x-data="greet">
    <span x-text="greeting()"></span>
    <input x-model="name" placeholder="Enter your name" />
</div>

@pushOnce('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <script>
        window.addEventListener('alpine:init', () => {
            Alpine.data('greet', () => ({
                name: '',
                init() {
                    this.setName('Mike');
                }
                setName(name) {
                    this.name = name;
                },
                greeting() {
                    return `Hello, ${this.name}!`;
                },
            }));
        });
    </script>
@endPushOnce -->



## Additional Resources

- [AlpineJS Docs: Re-usable
  Data](https://alpinejs.dev/directives/data#re-usable-data)
- [AlpineJS Docs: x-init](https://alpinejs.dev/directives/init)



# Alpine

- [Controlling Livewire from Alpine using `$wire`](#controlling-livewire-from-alpine-using-wire)
    - [Mutating Livewire properties](#mutating-livewire-properties)
    - [Calling Livewire methods](#calling-livewire-methods)
    - [Refreshing a component](#refreshing-a-component)
- [Alpine Arrow Function Syntax and Object Literal Notation](#alpine-arrow-function-syntax-and-object-literal-notation)
    - [Arrow Function with Implicit Return](#arrow-function-with-implicit-return)
    - [Arrow Function with Explicit Return and Local Variables](#arrow-function-with-explicit-return-and-local-variables)
- [Additional Resources](#additional-resources)


## Controlling Livewire from Alpine using `$wire`

`$wire` is a magic object representing the Livewire component, all properties from your component
can be accessed or mutated straight from JavaScript.

```html
Character count: <span x-text="$wire.content.length"></span> 
```

### Mutating Livewire properties

```html
<button type="button" x-on:click="$wire.title = ''">Clear</button> 
```

### Calling Livewire methods

In the following example, Alpine will listen or an blur event triggering a form save.

```html
<form wire:submit="save">
    <input wire:model="title" type="text" x-on:blur="$wire.save()">  
    <button type="submit">Save</button>
</form>
```

### Refreshing a component

You can easily refresh a Livewire component (trigger network roundtrip to re-render a component's
Blade view) using `$wire.$refresh()`:

```html
<button type="button" x-on:click="$wire.$refresh()">
```

## Alpine Arrow Function Syntax and Object Literal Notation

### Arrow Function with Implicit Return

Use this when you want to return an object directly without any additional logic.

```js
Alpine.data('simpleComponent', () => ({
    title: 'Hello World',
    show() {
        console.log(this.title);
    }
}));
```

**When to use:**

- When you want to return an object directly without any additional logic.
- When you want to keep the code clean and concise.
- When you want to avoid using the `return` keyword.

**When not to use:**
- When you need to perform additional logic before returning an object.
- When the object should not directly expose all variables.
- When you need to use local variables.

### Arrow Function with Explicit Return and Local Variables

Use this when you need to perform additional logic before returning an object or when the object
should not directly expose all variables.

```js
Alpine.data('complexComponent', () => {
    let title = 'Hello World';
    let count = 0;

    function increment() {
        count += 1;
        console.log(count);
    }

    return {
        title: title,
        show() {
            console.log(this.title);
        },
        increment: increment
    };
});
```

**When to use:**
- When you need to perform additional logic before returning an object.
- When the object should not directly expose all variables.
- When you need to use local variables.

**When not to use:**
- When you want to return an object directly without any additional logic.
- When you want to keep the code clean and concise.

## Additional Resources

- <a href="https://livewire.laravel.com/docs/alpine" target="blank">Official Documentation</a>
- <a href="https://livewire.laravel.com/docs/alpine#manually-bundling-alpine-in-your-javascript-build" target="blank">Manually bundling Alpine in your JavaScript build</a>
- <a href="https://alpinejs.dev/directives/data" target="blank">AlpineJS x-data</a>

Here is a revised, streamlined version that removes redundancy, merges related content, and keeps it clear and structured.

# Alpine

- [Arrow Function Syntax in Alpine](#arrow-function-syntax-in-alpine)
    - [Implicit Return](#implicit-return)
    - [Explicit Return with Local Variables](#explicit-return-with-local-variables)
- [Additional Resources](#additional-resources)


### Call Methods

You can also handle returned promises:

```html
<button type="button" x-on:click="$wire.setTitle('Apples').then(response => console.log(response))">Set</button>
```

Alpine can listen for browser events and trigger Livewire actions:

```html
<input wire:model="title" type="text" x-on:blur="$wire.save()">
<button type="button" x-on:click="$wire.deletePost({{ $post->id }})">Delete "{{ $post->title }}"</button>
```

### Refresh Components

Force a Livewire component to re-render:

```html
<button type="button" x-on:click="$wire.$refresh()">Refresh</button>
```

## Arrow Function Syntax in Alpine

### Implicit Return

Use when returning an object directly:

```js
Alpine.data('simpleComponent', () => ({
  title: 'Hello World',
  show() {
    console.log(this.title);
  }
}));
```

**Use when:**

* No extra logic is needed
* Keeping it concise is a priority

**Avoid when:**

* You need local variables or logic before returning

### Explicit Return with Local Variables

Use when setup requires local variables or pre-processing:

```js
Alpine.data('complexComponent', () => {
  let title = 'Hello World';
  let count = 0;

  function increment() {
    count += 1;
    console.log(count);
  }

  return {
    title,
    show() {
      console.log(this.title);
    },
    increment
  };
});
```

**Use when:**

* Pre-return logic is required
* Variables shouldn't be exposed on the returned object

## Additional Resources

* [Livewire + Alpine Integration](https://livewire.laravel.com/docs/alpine)
* [Bundling Alpine](https://livewire.laravel.com/docs/alpine#manually-bundling-alpine-in-your-javascript-build)
* [Alpine x-data](https://alpinejs.dev/directives/data)
* [Blade Parameter Gotchas](https://livewire.laravel.com/docs/alpine#blade-parameter-gotchas)

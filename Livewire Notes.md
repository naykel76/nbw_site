## Alpine Livewire Notes

- `$wire` is a magic object representing the Livewire component, all properties from your
component can be accessed or mutated straight from JavaScript

```html
<!-- clear a value -->
<button type="button" x-on:click="$wire.title = ''">Clear</button> 
<!-- set a value -->
<button type="button" x-on:click="$wire.title = 'Apples'">Set</button> 
```

- `$wire` can also be used to call methods from the Livewire component

```html
<button type="button" x-on:click="$wire.clearTitle()">Clear</button>
```

- `$wire` can also be used to call methods from the Livewire component with parameters

```html
<button type="button" x-on:click="$wire.setTitle('Apples')">Set</button>
```

- `$wire` can also be used to call methods from the Livewire component with parameters and receive a response

```html
<button type="button" x-on:click="$wire.setTitle('Apples').then(response => console.log(response))">Set</button>
```

## Calling Livewire methods from Alpine.js

Alpine can also easily call any Livewire methods/actions by simply calling them directly on $wire.

Here is an example of using Alpine to listen for a "blur" event on an input and triggering
a form save. The "blur" event is dispatched by the browser when a user presses "tab" to
remove focus from the current element and focus on the next one on the page:

```html
<input wire:model="title" type="text" x-on:blur="$wire.save()"> 
<!--  -->
<button type="button" x-on:click="$wire.deletePost({{ $post->id }})">
    Delete "{{ $post->title }}"
</button>
```

## Refresh Livewire component

```html
<button type="button" x-on:click="$wire.$refresh()">
```

## Additional Resources

[Blade parameter "gotchas"](https://livewire.laravel.com/docs/alpine#blade-parameter-gotchas)


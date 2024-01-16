# Alpine Quick Reference

<!-- MarkdownTOC -->

- [x-ref](#x-ref)
- [x-model](#x-model)
    - [How to use AlpineJS in a script instead of inline `Alpine.data()`](#how-to-use-alpinejs-in-a-script-instead-of-inline-alpinedata)

<!-- /MarkdownTOC -->


<a id="x-ref"></a>
## x-ref

`x-ref` in combination with `$refs` is a utility for accessing DOM elements directly like `getElementById` and `querySelector`.

- **`$refs`** is used to replace `document.getElementById` and `document.querySelector`
- **`x-ref`** is assigned instead of `id`

```html
<!-- instead of assigning an id, you add x-ref -->
<div x-data x-init="console.log($refs.greeting.innerHTML)">
    <div x-ref="greeting">Hello!</div>
</div>

<!-- replaces -->
<div x-data x-init="console.log(document.getElementById('greeting').innerHTML)">
    <div id="greeting">Hello!</div>
</div>
```

<a id="x-model"></a>
## x-model

https://alpinejs.dev/directives/model

`x-model` allows you to bind the value of an `input` (text, radio and checkbox) , `textarea` or `select` element to Alpine data.

```html
<textarea x-model="message"></textarea>
<span x-text="message"></span>

<div x-data="{ message: '' }">
    <input type="text" x-model="message">
    <button x-on:click="message = 'changed'">Change Message</button>
</div>
```


### How to use AlpineJS in a script instead of inline `Alpine.data()`

[Re-usable data in script (extract x-data)](https://alpinejs.dev/directives/data#re-usable-data)

https://alpinejs.dev/globals/alpine-data

```html
<div x-data="{message: '', someMethod: function() { console.log('Button has been clicked'); }}"
    x-init="message = 'This is the message'">
    <div x-text="message"></div>
    <button class="btn" x-on:click="someMethod()">Trigger Method</button>
</div>
```

```html
<div x-data="myComponent">
    <div x-text="message"></div>
    <button class="btn" x-on:click="someMethod()">Trigger Method</button>
</div>

<script>
    window.addEventListener('alpine:init', () => {
        Alpine.data('myComponent', () => ({
            message: '',
            init() {
                this.message = 'This is the message';
            },
            someMethod() {
                console.log('someMethod has been called')
            }
        }))
    })
</script>
```




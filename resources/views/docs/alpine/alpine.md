# Alpine Usage Examples

<!-- MarkdownTOC -->

- [x-ref](#x-ref)
- [x-model](#x-model)

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

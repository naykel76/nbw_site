# Alpine Usage Examples

<!-- MarkdownTOC -->

- [x-ref](#x-ref)
- [x-model](#x-model)
- [Things That Open and Close](#things-that-open-and-close)
    - [Toggle using x-show](#toggle-using-x-show)
    - [Toggle using css classes](#toggle-using-css-classes)

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

<a id="things-that-open-and-close"></a>
## Things That Open and Close

`x-transition` https://alpinejs.dev/directives/transition

<a id="toggle-using-x-show"></a>
### Toggle using x-show

<div x-data="{ open: false }">
    <button class="btn" x-on:click="open = ! open">Toggle</button>
    <div x-show="open">
        Hey there!
    </div>
</div>

```html
<div x-data="{ open: false }">
    <button x-on:click="open = ! open">Toggle</button>
    <div x-show="open"> ... </div>
</div>
```

<a id="toggle-using-css-classes"></a>
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

# Alpine Quick Reference

<!-- TOC -->

- [x-ref and $x-refs](#x-ref-and-x-refs)
- [`x-model`](#x-model)
    - [Entangle example](#entangle-example)
- [`x-text`](#x-text)
    - [Get a value using the `$wire` property](#get-a-value-using-the-wire-property)
    - [Entangle example](#entangle-example-1)
- [How to use AlpineJS in a script instead of inline `Alpine.data()`](#how-to-use-alpinejs-in-a-script-instead-of-inline-alpinedata)
- [FAQ's](#faqs)
        - [What's the difference between `x-text` and `x-model`?](#whats-the-difference-between-x-text-and-x-model)

<!-- /TOC -->

<a id="markdown-x-ref-and-x-refs" name="x-ref-and-x-refs"></a>

## x-ref and $x-refs

In Alpine.js, `$refs` is used as a replacement for `document.getElementById` and
`document.querySelector`. It allows you to access DOM elements directly from Alpine data. The
`x-ref` attribute is used to assign a reference name to a DOM element, and `$refs` is used to
access that element.

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

<a id="markdown-x-model" name="x-model"></a>

## `x-model`

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

<a id="markdown-entangle-example" name="entangle-example"></a>

### Entangle example

```html
<div x-data="{ inputValue: $wire.$entangle('firstname') }">
    <input id="firstname" x-model="inputValue">
</div>
```

<a id="markdown-x-text" name="x-text"></a>

## `x-text`

<a id="markdown-get-a-value-using-the-wire-property" name="get-a-value-using-the-wire-property"></a>

### Get a value using the `$wire` property

```html
<p>Firstname: <span x-text="$wire.firstname"></span></p>
```

<a id="markdown-entangle-example" name="entangle-example"></a>

### Entangle example

```html
<div x-data="{ message: $wire.entangle('message') }">
    <span x-text="message"></span>
</div>
```






<a id="markdown-how-to-use-alpinejs-in-a-script-instead-of-inline-alpinedata" name="how-to-use-alpinejs-in-a-script-instead-of-inline-alpinedata"></a>

## How to use AlpineJS in a script instead of inline `Alpine.data()`

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

<a id="markdown-faqs" name="faqs"></a>

## FAQ's

<a id="markdown-whats-the-difference-between-x-text-and-x-model" name="whats-the-difference-between-x-text-and-x-model"></a>

#### What's the difference between `x-text` and `x-model`?

`x-text`: This directive is used to update the text content of an element. It doesn't create a
two-way data binding. It's similar to using `textContent` in JavaScript.

`x-model`: This directive creates a two-way data binding between the element and the state. It's
typically used with form elements like `input`, `select`, and `textarea`. When the value of the
form element changes, the state is automatically updated. Similarly, when the state changes, the
value of the form element is automatically updated.

In summary, use `x-text` when you want to update the text content of an element, and use `x-model`
when you want to create a two-way data binding with a form element.



## How to use AlpineJS in a script instead of inline `Alpine.data()`


If you find yourself duplicating the contents of `x-data`, or you find the inline syntax
verbose, you can extract the `x-data` object out to a dedicated component using
`Alpine.data`.



- <a href="/docs/alpine/alpine-101#extract-x-data-to-a-separate-script-tag"
  target="blank">Extract <code>x-data</code> to a separate script tag</a>
- <a href="https://alpinejs.dev/directives/data#re-usable-data" target="blank">Alpine Docs
  Re-usable Data</a>


```html +parse
<div x-data="{
    message: 'This is the message.', 
    someMethod: function() { console.log('Button has been clicked'); }}"



    x-init="message = 'This is the message'">
    <div x-text="message"></div>
    <button class="btn" x-on:click="someMethod()">Trigger Method</button>
</div>
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
# Event Listener Examples
<!-- TOC -->

- [Keyboard Events](#keyboard-events)
        - [Keydown switch statement example](#keydown-switch-statement-example)
- [Additional Resources](#additional-resources)

<!-- /TOC -->
<a id="markdown-keyboard-events" name="keyboard-events"></a>

## Keyboard Events

You can use the `addEventListener()` method to listen for keyboard events at the document level.

```js
document.addEventListener('keydown', function(event) { });
document.addEventListener('keyup', function(event) { });
document.addEventListener('keypress', function(event) { });
```

Use the following code to check out the keydown event object.

```js
document.addEventListener('keydown', (e) => {
    console.log(e);
})
```

<a id="markdown-keydown-switch-statement-example" name="keydown-switch-statement-example"></a>

#### Keydown switch statement example

`e.keyCode` is deprecated

```js
document.addEventListener('keydown', (e) => {
    switch (e.key) {
        case 'ArrowUp':
            console.log(`${e.key} key pressed`);
            break;
        case 'ArrowDown':
            console.log(`${e.key} key pressed`);
            break;
        case 'ArrowLeft':
            console.log(`${e.key} key pressed`);
            break;
        case 'ArrowRight':
            console.log(`${e.key} key pressed`);
            break;
    }
})
```

When done, don't forget to remove the event listener with the removeEventListener() method.


<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

<a href="https://www.toptal.com/developers/keycode" target="blank">Key Codes</a>

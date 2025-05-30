# JavaScript FAQ's

<!-- TOC -->

- [How can I run a function when the screen first loads?](#how-can-i-run-a-function-when-the-screen-first-loads)
- [What selectors can I use to select the next instance of an element or class?](#what-selectors-can-i-use-to-select-the-next-instance-of-an-element-or-class)

<!-- /TOC -->


<a id="markdown-how-can-i-run-a-function-when-the-screen-first-loads" name="how-can-i-run-a-function-when-the-screen-first-loads"></a>

## How can I run a function when the screen first loads?

To run a function when the screen first loads, you can use the `window.onload` event or the modern
`DOMContentLoaded` event. These events ensure that your JavaScript code is executed after the HTML
content has been fully loaded and is ready to be manipulated.

```js
// `window.onload` event
window.onload = () => {
    myFunc();
};

// `DOMContentLoaded` event
document.addEventListener('DOMContentLoaded', () => {
    myFunc();
});
```

<a id="markdown-what-selectors-can-i-use-to-select-the-next-instance-of-an-element-or-class" name="what-selectors-can-i-use-to-select-the-next-instance-of-an-element-or-class"></a>

## What selectors can I use to select the next instance of an element or class?

```html
<script> // select next canvas </script>
<canvas></canvas>

<script> // select next canvas </script>
<canvas></canvas>

```

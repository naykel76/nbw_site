# Javascript Graphics and Animations

<!-- TOC -->

- [Setup the Canvas](#setup-the-canvas)
    - [Get the canvas element](#get-the-canvas-element)
    - [Get the context](#get-the-context)
- [Examples](#examples)

<!-- /TOC -->

<a id="markdown-setup-the-canvas" name="setup-the-canvas"></a>

## Setup the Canvas

HTML `canvas` is a rectangular area on a web page where you can use JavaScript to draw graphics
dynamically. The `canvas` element itself does not have drawing capabilities; instead, it serves as
a container for a graphics context. To draw on the canvas, you need to get the 2D rendering
context of the canvas, which is obtained using the `getContext()` method.

<a id="markdown-get-the-canvas-element" name="get-the-canvas-element"></a>

### Get the canvas element

```html
<canvas id="board"></canvas>
```

```js
const canvas = document.getElementById('board');
```

<a id="markdown-get-the-context" name="get-the-context"></a>

### Get the context
```js
const ctx = canvas.getContext('2d');
```

In this example, `getContext()` method is called on the `canvas` element with the argument `2d`,
which requests a 2D rendering context. The returned `ctx` object now provides methods and properties
for drawing shapes, text, images, and manipulating graphics within the canvas.

For example, to draw a rectangle on the canvas, you would use methods like `ctx.fillRect()` or
`ctx.strokeRect()`. To draw text, you would use the `ctx.fillText()` or `ctx.strokeText()`
methods. There are many other methods available on the ctx object to perform different drawing
operations.

<a id="markdown-examples" name="examples"></a>

## Examples

<!-- example -->
<canvas id="board"></canvas>
<script>
    const canvas = document.getElementById('board');
    const ctx = canvas.getContext('2d');
    ctx.fillStyle = 'green'; // Set the fill color
    ctx.fillRect(10, 10, 50, 50); // Draw rectangle at (10, 10) with width 50 and height 50
</script>

```html
<!-- html -->
<canvas id="board"></canvas>

<!-- javascript -->
<script>
    const canvas = document.getElementById('board');
    const ctx = canvas.getContext('2d');
    ctx.fillStyle = 'green'; // Set the fill color
    ctx.fillRect(10, 10, 50, 50); // Draw rectangle at (10, 10) with width 50 and height 50
</script>
```



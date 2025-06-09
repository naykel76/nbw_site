# Drawing Environment (Canvas)

<!-- TOC -->

- [Canvas](#canvas)
- [Getting the canvas context](#getting-the-canvas-context)
- [Basic drawing methods](#basic-drawing-methods)
- [Scaling Objects](#scaling-objects)
- [Context Methods](#context-methods)
- [Examples](#examples)
- [Other Resources](#other-resources)

<!-- /TOC -->

<a id="markdown-canvas" name="canvas"></a>

## Canvas

HTML `canvas` is a rectangular area on a web page where you can use JavaScript to draw graphics
dynamically. The `canvas` element itself does not have drawing capabilities; instead, it serves as
a container for a graphics context. To draw on the canvas, you need to get the 2D rendering
context as shown below.


```html
<canvas id="canvas"></canvas>
```

<a id="markdown-getting-the-canvas-context" name="getting-the-canvas-context"></a>

## Getting the canvas context

To draw on the canvas, you need to get the 2D rendering context of the canvas, which is obtained
using the `getContext()` method.

First, get the canvas element using a javascript selector, then get the drawing context.

```js
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
```
<!-- review -->
In this example, `getContext()` method is called on the `canvas` element with the argument `2d`,
which requests a 2D rendering context. The returned `ctx` object provides methods and properties
for drawing shapes, text, images, and manipulating graphics within the canvas.

For example, to draw a rectangle on the canvas, you would use methods like `ctx.fillRect()` or
`ctx.strokeRect()`.

<a id="markdown-basic-drawing-methods" name="basic-drawing-methods"></a>

## Basic drawing methods

The 2D rendering context provides various methods for drawing on the canvas:

```js
// Fill a rectangle with color
ctx.fillRect(x, y, width, height);

// Draw the outline of a rectangle
ctx.strokeRect(x, y, width, height);

// Clear a rectangular area
ctx.clearRect(x, y, width, height);

// Draw filled text
ctx.fillText(text, x, y);

// Draw the outline of text
ctx.strokeText(text, x, y);

// And more...
```

<a id="markdown-scaling-objects" name="scaling-objects"></a>

## Scaling Objects

Scaling objects involves resizing visual elements while maintaining their proportions. In HTML
canvas this can be achieve using the `scale()` method in the rendering context. By applying
scaling factors to dimensions like X, Y, width (w), and height (h), you can adjust object sizes
proportionally.

```js
ctx.scale(scaleX, scaleY);
```

This code scales the objects by a factor of `20` in both the `X` and `Y` making it more convenient
to work with sizes.

```js
ctx.scale(20, 20);
ctx.fillRect(10, 10, 50, 50); // Unscaled rectangle
ctx.fillRect(1, 1, 5, 5);     // Scaled rectangle

```

<a id="markdown-context-methods" name="context-methods"></a>

## Context Methods

<code-first-col></code-first-col>
| Method                                       | Description                                   |
| -------------------------------------------- | --------------------------------------------- |
| fillRect(x, y, width, height)                | Draws a filled rectangle.                     |
| strokeRect(x, y, width, height)              | Draws the outline of a rectangle.             |
| clearRect(x, y, width, height)               | Clears a rectangular area.                    |
| fillText(text, x, y)                         | Draws filled text.                            |
| strokeText(text, x, y)                       | Draws the outline of text.                    |
| beginPath()                                  | Starts a new path or resets the current path. |
| moveTo(x, y)                                 | Moves the pen to specified coordinates.       |
| lineTo(x, y)                                 | Draws a line to specified coordinates.        |
| arc(x, y, radius, start, end)                | Draws an arc or part of a circle.             |
| arcTo(x1, y1, x2, y2, radius)                | Draws an arc between two tangents.            |
| quadraticCurveTo(cpx, cpy, x, y)             | Draws a quadratic Bezier curve.               |
| bezierCurveTo(cp1x, cp1y, cp2x, cp2y, x, y)  | Draws a cubic Bezier curve.                   |
| rect(x, y, width, height)                    | Draws a rectangle path.                       |
| fill()                                       | Fills the current path with fill style.       |
| stroke()                                     | Strokes the current path with stroke style.   |
| drawImage(image, x, y, width, height)        | Draws an image on the canvas.                 |
| createLinearGradient(x0, y0, x1, y1)         | Creates a linear gradient object.             |
| createRadialGradient(x0, y0, r0, x1, y1, r1) | Creates a radial gradient object.             |
| createPattern(image, repetition)             | Creates a pattern from an image.              |

<a id="markdown-examples" name="examples"></a>

## Examples

<canvas id="canvas"></canvas>
<script>
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    ctx.canvas.height = 60
    ctx.scale(50, 50)
    ctx.fillStyle = 'green';
    ctx.fillRect(0, 0, 1, 1);
    ctx.fillStyle = 'orange';
    ctx.fillRect(2, 0, 1, 1);
</script>


```html
<canvas id="canvas"></canvas>
```

```js
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
ctx.canvas.height = 60
ctx.scale(50, 50)
ctx.fillStyle = 'green';
ctx.fillRect(0, 0, 1, 1);
ctx.fillStyle = 'orange';
ctx.fillRect(2, 0, 1, 1);
```

<a id="markdown-other-resources" name="other-resources"></a>

## Other Resources

- <a href="https://developer.mozilla.org/en-US/docs/Web/API/Canvas_API" target="blank">Canvas API</a>
- <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D" target="blank">MDN CanvasRenderingContext2D</a>
- [Two dimensional array](/docs/javascript/array-two-dimensional)


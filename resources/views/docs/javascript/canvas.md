# Drawing Environment (Canvas)

<!-- TOC -->

- [Quick Reference (WIP)](#quick-reference-wip)
- [Setup the Canvas](#setup-the-canvas)
    - [Get the drawing context](#get-the-drawing-context)
    - [Setting the Scale](#setting-the-scale)
- [Drawing on the canvas](#drawing-on-the-canvas)
    - [Context Methods](#context-methods)
- [Examples](#examples)
- [Other Resources](#other-resources)

<!-- /TOC -->

<a id="markdown-quick-reference-wip" name="quick-reference-wip"></a>

## Quick Reference (WIP)

If you want to cut through all the technical jargon, there are the important things to know.

`ctx` is the canvas object which provides access the the context methods. <br> For example,
`ctx.fillRect()`, `ctx.clearRect()`

`ctx.canvas` represents the actual HTML `<canvas>` element. It's used to access and modify
properties related to the canvas element itself, such as its width and height.

<a id="markdown-setup-the-canvas" name="setup-the-canvas"></a>

## Setup the Canvas

HTML `canvas` is a rectangular area on a web page where you can use JavaScript to draw graphics
dynamically. The `canvas` element itself does not have drawing capabilities; instead, it serves as
a container for a graphics context. To draw on the canvas, you need to get the 2D rendering
context of the canvas, which is obtained using the `getContext()` method.

Create a canvas element where graphics will be drawn

```html
<canvas id="canvas"></canvas>
```

Get the canvas element by id or one of the may other selectors.

```js
const canvas = document.getElementById('canvas');
```

<a id="markdown-get-the-drawing-context" name="get-the-drawing-context"></a>

### Get the drawing context
```js
const ctx = canvas.getContext('2d');
```

In this example, `getContext()` method is called on the `canvas` element with the argument `2d`,
which requests a 2D rendering context. The returned `ctx` object provides methods and properties
for drawing shapes, text, images, and manipulating graphics within the canvas.

For example, to draw a rectangle on the canvas, you would use methods like `ctx.fillRect()` or
`ctx.strokeRect()`.

<a id="markdown-setting-the-scale" name="setting-the-scale"></a>

### Setting the Scale

Scaling objects involves resizing visual elements while maintaining their proportions. In HTML
canvas this can be achieve using the `scale()` method in the rendering context. By applying
scaling factors to dimensions like X, Y, width (w), and height (h), you can adjust object sizes
proportionally.

```js
ctx.scale(20, 20);
```

This code scales the objects by a factor of `20` in both the `X` and `Y` making it more convenient
to work with sizes.

```js
// not scaled
ctx.fillRect(10, 10, 50, 50);

// scaled
ctx.fillRect(1, 1, 5, 5);
```

<a id="markdown-drawing-on-the-canvas" name="drawing-on-the-canvas"></a>

## Drawing on the canvas

Once you have created the context, you can draw shapes on the canvas using the `context` methods.

<canvas id="canvas"></canvas>
<script>
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    ctx.canvas.height = 60
    ctx.scale(50, 50)
    ctx.fillStyle = 'green';
    ctx.fillRect(0, 0, 1, 1);
    ctx.fillRect(2, 0, 1, 1);
</script>

```js
ctx.fillRect(0, 0, 1, 1);
ctx.fillRect(2, 0, 1, 1);
```

<a id="markdown-context-methods" name="context-methods"></a>

### Context Methods

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


```html
<canvas id="canvas"></canvas>
```

```js
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
ctx.fillStyle = 'green'; // Set the fill color
ctx.fillRect(10, 10, 50, 50); // Draw rectangle at (10, 10) with width 50 and height 50
```

<a id="markdown-other-resources" name="other-resources"></a>

## Other Resources

- <a href="https://developer.mozilla.org/en-US/docs/Web/API/Canvas_API" target="blank">Canvas API</a>
- <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D" target="blank">MDN CanvasRenderingContext2D</a>
- [Two dimensional array](/docs/javascript/array-two-dimensional)


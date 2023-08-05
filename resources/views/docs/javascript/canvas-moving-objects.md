# Making Thinks Move

<!-- TOC -->

- [Overview](#overview)
- [Moving](#moving)
- [Context Methods](#context-methods)

<!-- /TOC -->

<a id="markdown-overview" name="overview"></a>

## Overview

Canvas uses immediate rendering meaning that when we draw, it immediately renders on the screen.
After we paint something, the canvas forgets about the object and only knows it as pixels. So,
there is no object that we can move. Instead, we have to draw it again.

Doing animations on Canvas is like making a stop-motion movie. In every frame, we need to move the
objects a little bit to animate them.

Additionally, you need to keep in mind that when you move an element, you need to clear the
previous one. This can be easily accomplished using the `clearRect()` method, using the `width`
and `height` of the canvas, we can clean it between consecutive paints.

Note, the context scale has been increase to make calculations easier.

```js
// paint a square
ctx.fillRect(1, 0, 2, 2);
// clear the square
ctx.clearRect(1, 0, 2, 2);
// paint square in the next location
ctx.fillRect(4, 0, 2, 2);
```

Rather than clearing items one at a time, you can clear the entire canvas using;

```js
ctx.clearRect(0, 0, canvas.height, canvas.width);
```

<a id="markdown-moving" name="moving"></a>

## Moving

<canvas id="canvas"></canvas>
<script>
    canvas = document.getElementById('canvas');
    ctx = canvas.getContext('2d');
    ctx.canvas.width = 200;
    ctx.canvas.height = 100;
    ctx.fillStyle = 'green';
    ctx.scale(20,20)
    ctx.fillRect(1, 0, 2, 2);
    // ctx.clearRect(1, 0, canvas.height, canvas.width);
    ctx.fillRect(4, 0, 2, 2);
</script>

----------





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

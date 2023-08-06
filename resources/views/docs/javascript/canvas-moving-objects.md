# Making Things Move

<!-- TOC -->

- [Overview](#overview)
- [Moving](#moving)
- [requestAnimationFrame vs setInterval](#requestanimationframe-vs-setinterval)
    - [`window.requestAnimationFrame()`](#windowrequestanimationframe)
    - [`setInterval()`](#setinterval)
- [Questions](#questions)
        - [How do I stop an interval?](#how-do-i-stop-an-interval)
- [Addition Resources](#addition-resources)

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

<a id="markdown-requestanimationframe-vs-setinterval" name="requestanimationframe-vs-setinterval"></a>

## requestAnimationFrame vs setInterval

Both `requestAnimationFrame` and `setInterval` are used for creating animations or executing
repetitive tasks, but they have some key differences that make `requestAnimationFrame` more
suitable for animations and smoother visual effects.

<a id="markdown-windowrequestanimationframe" name="windowrequestanimationframe"></a>

### `window.requestAnimationFrame()`

<a href="https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame#examples" target="blank">MDN Examples</a>
```js
requestAnimationFrame(callback)
```

<div class="bx info flex">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#info"></use></svg>
    <div>Note: Your callback routine must itself call requestAnimationFrame() again if you want to animate another frame at the next repaint. requestAnimationFrame() is 1 shot</div>
</div>


<a id="markdown-setinterval" name="setinterval"></a>

### `setInterval()`

```js
setInterval(func, delay)
```

`setInterval` executes a given function at a fixed time interval, regardless of the screen refresh
rate. It might result in uneven frame rates and less-smooth animations, especially if the interval
is too short or if the device is under load.

<a id="markdown-questions" name="questions"></a>

## Questions

<a id="markdown-how-do-i-stop-an-interval" name="how-do-i-stop-an-interval"></a>

#### How do I stop an interval?


function drop() {
    let piece = canvas.piece;
    setInterval(() => piece.move({ x: 1, y: 0 }), 1000)
}


<a id="markdown-addition-resources" name="addition-resources"></a>

## Addition Resources

- <a href="https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame" target="blank">MDN requestAnimationFrame()</a>
- <a href="https://developer.mozilla.org/en-US/docs/Web/API/setInterval" target="blank">MDN setInterval()</a>

# Making Things Move

<!-- TOC -->

- [Overview](#overview)
- [Moving Strategy](#moving-strategy)
    - [`window.requestAnimationFrame()`](#windowrequestanimationframe)
    - [`setInterval()`](#setinterval)
    - [Prevent compounding](#prevent-compounding)
- [Questions](#questions)
        - [How do I stop an animation frame?](#how-do-i-stop-an-animation-frame)
        - [How do I stop an interval?](#how-do-i-stop-an-interval)
- [Examples](#examples)
    - [Start and stop animation frames](#start-and-stop-animation-frames)
- [Addition Resources](#addition-resources)

<!-- /TOC -->

<a id="markdown-overview" name="overview"></a>

## Overview

Canvas uses immediate rendering meaning that when we draw, it immediately renders on the screen.
After we paint something, the canvas forgets about the object and only knows it as pixels. So,
there is no object that we can move. Instead, we have to draw it again.

Doing animations on Canvas is like making a stop-motion movie. In every frame, we need to move the
objects a little bit to animate them.

It's important to note that when you move an element, you must clear the previous one. The
`clearRect()` method is commonly used for this purpose. By specifying the dimensions of the object
to be cleared, you effectively erase its previous position from the canvas.

```js
// Paint a square
ctx.fillRect(1, 0, 2, 2);

// Clear the square's previous location
ctx.clearRect(1, 0, 2, 2);

// Paint the square in its next location
ctx.fillRect(4, 0, 2, 2);
```

If you're dealing with multiple objects, you can clear the entire canvas using:

```js
ctx.clearRect(0, 0, canvas.height, canvas.width);
```

<a id="markdown-moving-strategy" name="moving-strategy"></a>

## Moving Strategy

Both `requestAnimationFrame` and `setInterval` are used for creating animations or executing
repetitive tasks, but they have some key differences that make `requestAnimationFrame` more
suitable for animations and smoother visual effects.

`requestAnimationFrame` is a browser API that optimises animations by synchronizing them with the
browser's rendering cycle. This helps in achieving smoother animations and eliminates unnecessary
rendering when the tab is not active.

On the other hand, `setInterval` executes a given function at a fixed time interval, irrespective
of the screen refresh rate. This approach might lead to uneven frame rates and less fluid
animations, especially if the interval is too short or if the device is experiencing heavy
processing.


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

```js
 requestAnimationFrame(callback);
```

```js
let x = 0;

function animate() {
    // Clear the canvas
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    // Draw a small square at the new x position
    ctx.fillRect(x, 0, 1, 1);
    // Increment x for the next frame
    x += 1;
    // Use requestAnimationFrame for the next frame
    requestAnimationFrame(animate);
}

animate();
```


<a id="markdown-setinterval" name="setinterval"></a>

### `setInterval()`

```js
setInterval(callback, delay)
```

```js
let x = 0;

function animate() {
    // Clear the canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw the square at the new position
    ctx.fillRect(x, 50, 50, 50);

    // Increment x for the next frame
    x += 1;
}

setInterval(animate, 16);
```

<a id="markdown-prevent-compounding" name="prevent-compounding"></a>

### Prevent compounding

To prevent the interval from compounding each time the button is clicked, you need to make sure
that you're not creating a new interval on every button click. Instead, you should only start a
new interval if one isn't already active. You can achieve this by checking if the interval is
already running before starting a new one.


```javascript
let myInterval;

function startInterval() {
    if (!myInterval) {
        myInterval = setInterval(() => {
            // Your interval logic here
        }, 1000);
    }
}

function stopInterval() {
    if (myInterval) {
        clearInterval(myInterval);
        myInterval = undefined; // Reset the interval ID
    }
}
```

In this example, the interval is only started when the button is clicked if there's no active interval (`intervalId` is not set). This prevents the interval from speeding up on every button click and ensures that only one interval is running at a time.

<a id="markdown-questions" name="questions"></a>

## Questions

<a id="markdown-how-do-i-stop-an-animation-frame" name="how-do-i-stop-an-animation-frame"></a>

#### How do I stop an animation frame?

To stop an animation that is running using the `requestAnimationFrame` function, you can use the
`cancelAnimationFrame` function.

```js
let myAnimation; // Declare variable for reference

function animate() {
    // Your animation logic here

    // Request the next animation frame
    myAnimation = requestAnimationFrame(animate);
}

function stopAnimation() {
    cancelAnimationFrame(myAnimation); // Cancel the animation frame request
}
```

<a id="markdown-how-do-i-stop-an-interval" name="how-do-i-stop-an-interval"></a>

#### How do I stop an interval?

To stop an interval you can use the `clearInterval` function.

```js
let myInterval = setInterval(() => {
    // interval logic here
}, 1000);

clearInterval(myInterval);
```

<a id="markdown-examples" name="examples"></a>

## Examples

The following examples assume you already have the [canvas and context](/docs/javascript/canvas) set up.


<a id="markdown-start-and-stop-animation-frames" name="start-and-stop-animation-frames"></a>

### Start and stop animation frames
`requestAnimationFrame` and `cancelAnimationFrame`

Starts and stops from current `x` and `y` position.

```js
let myAnimation: number; // Declare variable for reference
let x = 0;
let speed = 0.1;
let animationRunning = false; // Track whether animation is already running

function startAnimation() {
    if (!animationRunning) {
        animationRunning = true; // Set animation as running
        animate();
    }
}

function animate() {
    // Clear the canvas
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    // Draw a shape at the new x position
    ctx.fillRect(x, 1, 1, 1);
    // Increment x based on the speed for the next frame
    x += speed;
    // Use requestAnimationFrame for the next frame
    myAnimation = requestAnimationFrame(animate);
}

function stopAnimation() {
    cancelAnimationFrame(myAnimation);
    animationRunning = false; // Reset animation status
}
```

Compounding speed

```js
let myAnimation: number; // Declare variable for reference
let x = 0;
let speed = .1;

function startAnimation() {
    // Clear the canvas
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    // Draw a shape at the new x position
    ctx.fillRect(x, 1, 1, 1);
    // Increment x based on the speed for the next frame
    x += speed;
    // Use requestAnimationFrame for the next frame
    myAnimation = requestAnimationFrame(startAnimation);
}

function stopAnimation() {
    cancelAnimationFrame(myAnimation);
}
```

<a id="markdown-setinterval-and-clearinterval" name="setinterval-and-clearinterval"></a>

###### `setInterval` and `clearInterval`

Starts and stops from current `x` and `y` position.

```js
let myInterval: number | undefined; // Declare variable for reference
let x = 0;
let step = 1; // distance each step will take

function startInterval() {
    // prevent interval from compounding
    if (!myInterval) {
        myInterval = setInterval(() => {
            // Clear the canvas
            ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            // Draw a shape at the new x position
            ctx.fillRect(x, 1, 1, 1);
            // increment x by the step distance
            x += step;
        }, 500)
    }
}

function stopInterval() {
    if (myInterval) {
        clearInterval(myInterval);
        myInterval = undefined; // Reset the interval ID
    }
}
```


<a id="markdown-addition-resources" name="addition-resources"></a>

## Addition Resources

- <a href="https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame" target="blank">MDN requestAnimationFrame()</a>
- <a href="https://developer.mozilla.org/en-US/docs/Web/API/setInterval" target="blank">MDN setInterval()</a>


<!-- THIS WORKS LIKE AN INCREMENT AND DECREMENT -->

<!-- let myAnimation: number; // Declare variable for reference
let x = 0;
let speed = .1;

function startAnimation() {
    // Clear the canvas
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    // Draw a shape at the new x position
    ctx.fillRect(x, 1, 1, 1);
    // Increment x based on the speed for the next frame
    x += speed;
    // Use requestAnimationFrame for the next frame
    myAnimation = requestAnimationFrame(startAnimation);
}

function stopAnimation() {
    cancelAnimationFrame(myAnimation);
} -->

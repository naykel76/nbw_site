# Move Basic Shape
<!-- TOC -->

- [Collision Conditions](#collision-conditions)
    - [Left and Right](#left-and-right)
    - [Up and Down](#up-and-down)
- [Test it out](#test-it-out)

<!-- /TOC -->





<a id="markdown-collision-conditions" name="collision-conditions"></a>

## Collision Conditions

<a id="markdown-left-and-right" name="left-and-right"></a>

### Left and Right

**IF**, the left arrow key is pressed <br>
**WHEN**, the piece's x-coordinate is greater than 0 <br>
**THEN**, move the piece left by decreasing its x-coordinate by 1 <br>

**IF**, the right arrow key is pressed <br>
**WHEN**, the piece's x-coordinate is less than canvas width / scale - 1 <br>
**THEN**, move the piece right by increasing its x-coordinate by 1 <br>


```js
if (event.key == 'ArrowLeft' && piece.x > 0) {
    piece.move({ x: -1, y: 0 });
} else if (event.key == 'ArrowRight' && piece.x < canvas.width / scale - 1) {
    piece.move({ x: 1, y: 0 });
}
```

<a id="markdown-up-and-down" name="up-and-down"></a>

### Up and Down

**IF**, the up arrow key is pressed <br>
**WHEN**, the piece's y-coordinate is greater than 0 <br>
**THEN**, move the piece up by decreasing its y-coordinate by 1 <br>

**IF**, the down arrow key is pressed <br>
**WHEN**, the piece's y-coordinate is less than canvas height / scale - 1 <br>
**THEN**, move the piece down by increasing its y-coordinate by 1 <br>

```js
if (event.key == 'ArrowUp' && piece.y > 0) {
    piece.move({ x: 0, y: -1 });
} else if (event.key == 'ArrowDown' && piece.y < canvas.height / scale - 1) {
    piece.move({ x: 0, y: 1 });
}
```

<a id="markdown-test-it-out" name="test-it-out"></a>

## Test it out

Use the arrow keys on your keyboard to move the square. You'll notice that the square can exit the
board, as collision detection hasn't been implemented to limit its motion.

<canvas id="canvas" class="bdr-3 bdr-red"></canvas>
<script src="/js/animation-exercise/03-collision-detection.js"></script>

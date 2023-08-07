# Boundary and Collision Detection
<!-- TOC -->

- [Boundary detection conditions](#boundary-detection-conditions)
    - [Left and Right boundary](#left-and-right-boundary)
    - [Top and Bottom boundary](#top-and-bottom-boundary)
- [Test it out](#test-it-out)
- [Complete Code](#complete-code)

<!-- /TOC -->

<a id="markdown-boundary-detection-conditions" name="boundary-detection-conditions"></a>

## Boundary detection conditions

<a id="markdown-left-and-right-boundary" name="left-and-right-boundary"></a>

### Left and Right boundary

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

<a id="markdown-top-and-bottom-boundary" name="top-and-bottom-boundary"></a>

### Top and Bottom boundary

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

Use the arrow keys on your keyboard to move the square. Boundary detection has been implemented,
preventing the box moving outside of the canvas.

<canvas id="canvas" class="bdr-3 bdr-red"></canvas>
<script src="/js/animation-exercise/04-collision-detection.js"></script>

<a id="markdown-complete-code" name="complete-code"></a>

## Complete Code

This example only focuses on the functionality, you will need to add styles yourself if you want
it to look pretty.

Add the canvas element to your html

```html
<canvas id="canvas"></canvas>
```
Put this is a script tag or it's own javascript file.

```js
// Set up the canvas
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const scale = 20;
ctx.canvas.width = 400;
ctx.canvas.height = 100;
ctx.scale(scale, scale);

// ==========================================================================

// Class for managing the canvas
class Canvas {
    constructor(ctx) {
        this.ctx = ctx;

        // Create a new piece when the canvas is initialized
        this.piece = new Piece(this.ctx);
    }
}

// ==========================================================================

// Class representing a piece on the canvas
class Piece {
    constructor(ctx) {
        this.ctx = ctx;
        this.x = 1; // Initial x position
        this.y = 1; // Initial y position
        this.color = 'orange';
        this.render(); // Render the piece on initialization
    }

    move(piece) {
        this.x = this.x + piece.x;
        this.y = this.y + piece.y;
        this.ctx.clearRect(0, 0, canvas.width, canvas.height)
        this.render(); // Render the piece on initialization
    }

    // Render the piece on the canvas
    render() {
        this.ctx.fillStyle = this.color;
        this.ctx.fillRect(this.x, this.y, 1, 1);
    }
}

// ==========================================================================

// Initialize the canvas and create a new piece
let board = new Canvas(ctx);

// ==========================================================================

document.addEventListener('keydown', handleKeyPress);

const KEYS = {
    ArrowLeft: 37,
    ArrowRight: 39,
    ArrowUp: 38,
    ArrowDown: 40
};

function handleKeyPress(event) {
    const key = event.key;

    if (KEYS.hasOwnProperty(key)) {
        event.preventDefault();

        let piece = board.piece;
        if (event.key == 'ArrowLeft' && piece.x > 0) {
            piece.move({ x: -1, y: 0 });
        } else if (event.key == 'ArrowRight' && piece.x < canvas.width / scale - 1) {
            piece.move({ x: 1, y: 0 });
        } else if (event.key == 'ArrowUp' && piece.y > 0) {
            piece.move({ x: 0, y: -1 });
        } else if (event.key == 'ArrowDown' && piece.y < canvas.height / scale - 1) {
            piece.move({ x: 0, y: 1 });
        }
    }
}

// ==========================================================================
```

# Animation Exercise
<!-- TOC -->

- [Initial Setup](#initial-setup)
    - [Setup the canvas](#setup-the-canvas)
    - [Create the Canvas class](#create-the-canvas-class)
    - [Create the Piece class](#create-the-piece-class)
    - [Initialise the canvas and pass in the context](#initialise-the-canvas-and-pass-in-the-context)

<!-- /TOC -->
<a id="markdown-initial-setup" name="initial-setup"></a>

## Initial Setup

Add the `canvas` element to your HTML.

```html
<canvas id="canvas"></canvas>
```
<a id="markdown-setup-the-canvas" name="setup-the-canvas"></a>

### Setup the canvas
```js
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
ctx.canvas.width = 400;
ctx.canvas.height = 100;
ctx.scale(20, 20);
```

<a id="markdown-create-the-canvas-class" name="create-the-canvas-class"></a>

### Create the Canvas class
```js
class Canvas {
    constructor(ctx) {
        this.ctx = ctx;

        // Create a new piece when the canvas is initialized
        this.piece = new Piece(this.ctx);
    }
}
```

<a id="markdown-create-the-piece-class" name="create-the-piece-class"></a>

### Create the Piece class
```js
class Piece {
    constructor(ctx) {
        this.ctx = ctx
        this.x = 1; // start position
        this.y = 1; // start position
        this.color = 'orange';

        // Render the piece on initialisation
        this.render();
    }

    render() {
        this.ctx.fillStyle = this.color;
        this.ctx.fillRect(this.x, this.y, 1, 1);
    }
}
```

<a id="markdown-initialise-the-canvas-and-pass-in-the-context" name="initialise-the-canvas-and-pass-in-the-context"></a>

### Initialise the canvas and pass in the context

```js
new Canvas(ctx);
```

<canvas id="canvas" class="bdr-3 bdr-red"></canvas>

<script src="/js/animation-exercise/01-initial-setup.js"></script>

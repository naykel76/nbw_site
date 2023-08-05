## Calculate the new position

To begin, we need to calculate the new position of piece depending on which key we press:

move left `piece.x - 1`

move right `piece.x + 1`

move down `piece.y - 1`


<!-- We can start by adding a move() method to the piece class. It takes a piece p as input and updates the x or y variable of the current piece to change its position on the board: -->


<!-- To begin, we need to calculate the new position of piece depending on which key we press:

    left: we move p.x - 1
    right: we move p.x + 1
    down: we move p.y - 1 -->

<!-- ```js
const KEY = {
    LEFT: 37,
    UP: 38,
    RIGHT: 39,
    DOWN: 40,
}
``` -->

<canvas id="canvas1" class="bdr-3 bdr-red"></canvas>

```js
const canvas = document.getElementById('canvas1');
const ctx = canvas1.getContext('2d');
ctx.canvas.width = 200;
ctx.canvas.height = 100;
ctx.scale(20, 20);

class Canvas {
    constructor(ctx) {
        this.ctx = ctx;
        new Piece(this.ctx)
    }
}

class Piece {
    constructor(ctx) {
        this.ctx = ctx
        this.x = 1; // start position
        this.y = 1; // start position
        this.color = 'orange';
        this.render();
    }

    render() {
        this.ctx.fillStyle = this.color;
        this.ctx.fillRect(this.x, this.y, 1, 1);
    }
}

new Canvas(ctx);
```

<script src="/js/tetris/tetris.js"></script>
<script src="/js/tetris/keys.js"></script>


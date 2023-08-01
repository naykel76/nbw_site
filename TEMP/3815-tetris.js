import './scss/styles.scss'

{/* <div class="container maxw-sm my-auto tac">
<div class="flex gg-3">
    <canvas id="board" class="bdr-red bdr-3"></canvas>
    <div>
        <h1>TETRIS</h1>
        <p>Score: <span id="score">0</span></p>
        <p>Lines: <span id="lines">0</span></p>
        <p>Level: <span id="level">0</span></p>
        <canvas id="next" class="next"></canvas>
        <hr>
        <button onclick="play()" class="btn lg pink">Play</button>
    </div>
</div>
</div>

<script type="module" src="/main.js" defer></script> */}


/**
 * Game configuration
 */
let config = {
    cols: 10,
    rows: 20,
    blockSize: 30
};


// ==========================================================================

/**
 * this section will create a container for the game
 */

// Get the canvas element
const canvas = document.getElementById('board');

// Get the 2d context which provides methods and properties for drawing
// shapes, text, images, and manipulating graphics within the canvas.
const ctx = canvas.getContext('2d');

// Calculate size of canvas base on configured settings.
ctx.canvas.width = config.cols * config.blockSize;
ctx.canvas.height = config.rows * config.blockSize;

// By using the scale, we can always give the size of the blocks as one (1)
// instead of having to calculate with BLOCK_SIZE everywhere 1 = 10px
ctx.scale(config.blockSize, config.blockSize);

// ==========================================================================

// By sending the context to the board class, we can access it when needed.
class Board {
    constructor(ctx) {
        this.ctx = ctx;
        this.grid = this.getEmptyBoard();
    }

    getEmptyBoard() {
        return Array.from(
            { length: config.rows }, () => Array(config.columns).fill(0)
        );
    }
}

let board = new Board(ctx);

function play() {
    board = new Board(ctx);
    console.table(board.grid);
}



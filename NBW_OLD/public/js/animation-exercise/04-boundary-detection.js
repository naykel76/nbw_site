// Set up the canvas
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const scale = 20; // makes it easier dealing with collisions
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




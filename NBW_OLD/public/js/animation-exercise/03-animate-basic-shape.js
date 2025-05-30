// Set up the canvas
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const scale = 20; // makes it easier dealing with collisions
ctx.canvas.width = 600;
ctx.canvas.height = 100;
ctx.scale(scale, scale);

// ==========================================================================

// Class for managing the canvas
class Canvas {
    constructor(ctx) {
        this.ctx = ctx;
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


// Create a new piece when the canvas is initialized
this.piece = new Piece(this.ctx);

// ==========================================================================

// Initialize the canvas and create a new piece
let board = new Canvas(ctx);

let x = 0;
let speed = .1; // Adjust the speed factor as needed

function animate() {
    // Clear the canvas
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    // Draw a small square at the new x position
    ctx.fillRect(x, 0, 1, 1);
    // Increment x based on the speed for the next frame
    x += speed;
    // Use requestAnimationFrame for the next frame
    requestAnimationFrame(animate);
}

animate();




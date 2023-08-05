// Set up the canvas
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
ctx.canvas.width = 400;
ctx.canvas.height = 100;
ctx.scale(20, 20);

// Class for managing the canvas
class Canvas {
    constructor(ctx) {
        this.ctx = ctx;

        // Create a new piece when the canvas is initialized
        this.piece = new Piece(this.ctx);
    }
}

// Class representing a piece on the canvas
class Piece {
    constructor(ctx) {
        this.ctx = ctx;
        this.x = 1; // Initial x position
        this.y = 1; // Initial y position
        this.color = 'orange';
        this.render(); // Render the piece on initialization
    }

    // Render the piece on the canvas
    render() {
        this.ctx.fillStyle = this.color;
        this.ctx.fillRect(this.x, this.y, 1, 1);
    }
}

// Initialize the canvas and create a new piece
new Canvas(ctx);

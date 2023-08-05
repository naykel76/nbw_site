// set up the canvas
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
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

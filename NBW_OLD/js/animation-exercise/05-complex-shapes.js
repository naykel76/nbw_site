/** =========================================================================
 *  Draw tetromino manually
 * ==========================================================================
 */

const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
ctx.canvas.width = 300;
ctx.canvas.height = 100;
ctx.scale(20, 20);
ctx.fillStyle = 'limegreen';

//
ctx.fillRect(0, 0, 1, 1);
ctx.fillRect(0, 1, 1, 1);
ctx.fillRect(1, 1, 1, 1);
ctx.fillRect(2, 1, 1, 1);
//
ctx.fillRect(5, 0, 1, 1);
ctx.fillRect(5, 1, 1, 1);
ctx.fillRect(5, 2, 1, 1);
ctx.fillRect(4, 2, 1, 1);
//
ctx.fillRect(7, 0, 1, 1);
ctx.fillRect(8, 0, 1, 1);
ctx.fillRect(9, 0, 1, 1);
ctx.fillRect(9, 1, 1, 1);
//
ctx.fillRect(11, 0, 1, 1);
ctx.fillRect(11, 1, 1, 1);
ctx.fillRect(11, 2, 1, 1);
ctx.fillRect(12, 0, 1, 1);

/** =========================================================================
 *  Draw tetromino with a matrix
 * ==========================================================================
 */

const canvas1 = document.getElementById('canvas1');
const ctx1 = canvas1.getContext('2d');
ctx1.canvas.width = 300;
ctx1.canvas.height = 100;
ctx1.scale(20, 20);
ctx1.fillStyle = 'pink';

const J = [
    [1, 0, 0, 0], // y = 0
    [1, 1, 1, 0], // y = 1
    [0, 0, 0, 0], // y = 2
    [0, 0, 0, 0], // y = 3
    [0, 0, 0, 0], // y = 4
];
const J1 = [
    [0, 0, 0, 0, 0, 1, 0], // y = 0
    [0, 0, 0, 0, 0, 1, 0], // y = 1
    [0, 0, 0, 0, 1, 1, 0], // y = 2
    [0, 0, 0, 0, 0, 0, 0], // y = 3
    [0, 0, 0, 0, 0, 0, 0], // y = 4
];
const J2 = [
    [0, 0, 0, 0, 0, 0, 0, 1, 1, 1], // y = 0
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 1], // y = 1
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // y = 2
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // y = 3
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // y = 4
];
const J3 = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1], // y = 0
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0], // y = 1
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0], // y = 2
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // y = 3
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // y = 4
];

// each array represents a row on the grid or y[i]
// each value in an array (row) represents the x[i] position
// any value > 0 indicates the square is visible
function renderShape(matrix) {
    matrix.forEach((row, y) => {
        row.forEach((value, x) => {
            if (value > 0) {
                ctx1.fillRect(x, y, 1, 1);
            }
        });
    });
}

renderShape(J);
renderShape(J1);
renderShape(J2);
renderShape(J3);


/** =========================================================================
 *  Draw smiley from a matrix
 * ==========================================================================
 */

// const canvas2 = document.getElementById('canvas2');
// const ctx2 = canvas2.getContext('2d');
// ctx2.canvas.width = 300;
// ctx2.canvas.height = 100;
// ctx2.scale(20, 20);
// ctx2.fillStyle = 'pink';

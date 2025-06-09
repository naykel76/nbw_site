// ==========================================================================

const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
ctx.canvas.width = 300;
ctx.canvas.height = 100;
ctx.scale(10, 10);
ctx.fillStyle = 'pink';

// Define the original smiley matrix
const smiley = [
    [0, 0, 1, 0, 1, 0, 0],
    [1, 0, 0, 0, 0, 0, 1],
    [1, 0, 0, 0, 0, 0, 1],
    [0, 1, 0, 0, 0, 1, 0],
    [0, 0, 1, 1, 1, 0, 0]
];

// Function to render a shape on the canvas
function renderShape(shape) {
    shape.forEach((row, y) => {
        row.forEach((value, x) => {
            if (value > 0) {
                // Draw a filled rectangle for each visible square
                ctx.fillRect(x + 1, y + 1, 1, 1);
            }
        });
    });
}

renderShape(smiley);

// ==========================================================================

const canvas1 = document.getElementById('canvas1');
const ctx1 = canvas1.getContext('2d');
ctx1.canvas.width = 300;
ctx1.canvas.height = 100;
ctx1.scale(10, 10);
ctx1.fillStyle = 'pink';

// Function to render a shape on the canvas
function renderShape1(shape) {
    shape.forEach((row, y) => {
        row.forEach((value, x) => {
            if (value > 0) {
                // Draw a filled rectangle for each visible square
                ctx1.fillRect(x + 1, y + 1, 1, 1);
            }
        });
    });
}

/**
 * original       transposed
 * [a, b, c]  =>  [a, d, g]
 * [d, e, f]  =>  [b, e, h]
 * [g, h, i]  =>  [c, f, i]
 *
 * @param {array} matrix - two dimensional array
 * @returns {array} original matrix inverted
 */
function transposeMatrix(matrix) {
    const numRows = matrix.length;
    const numCols = matrix[0].length;
    console.log(numRows);

    // Create a new matrix for the transposed values
    const transposedMatrix = new Array(numCols).fill(null).map(() => new Array(numRows));
    // Loop through rows and columns to perform transposition
    for (let row = 0; row < numRows; row++) {
        for (let col = 0; col < numCols; col++) {
            transposedMatrix[col][row] = matrix[row][col];
        }
    }

    return transposedMatrix;
}

// Transpose the smiley matrix
const transposedSmiley = transposeMatrix(smiley);

// Render the transposed smiley on the canvas
renderShape1(transposedSmiley);

// ==========================================================================

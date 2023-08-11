# Rotation Matrix

<p class="lead">Say what now!</p>

A rotation matrix is a mathematical tool that helps you rotate points around a fixed point, like
the center of a coordinate system. Imagine you're moving a picture on a wall. The picture stays in
one place, but you rotate it to a new angle.

```js
original    =>   transposed
[a, b, c]   =>   [a, d, g]
[d, e, f]   =>   [b, e, h]
[g, h, i]   =>   [c, f, i]
```

Make sure you understand how the [matrix drawing loop](docs/javascript/animation-exercise/05-complex-shapes#matrix-drawing-loop) works.

There is a whole bunch of math behind a <a href="https://en.wikipedia.org/wiki/Rotation_matrix" target="blank">rotation matrix</a> that was created by some math nerds much smarter than me, but bottom line: use this function to rotate a matrix.

```js
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
```

The function takes a matrix like this.

```js
const smiley = [
    [0, 0, 1, 0, 1, 0, 0],
    [1, 0, 0, 0, 0, 0, 1],
    [1, 0, 0, 0, 0, 0, 1],
    [0, 1, 0, 0, 0, 1, 0],
    [0, 0, 1, 1, 1, 0, 0]
];
```

<canvas id="canvas" class="bdr-3 bdr-red my"></canvas>

And turns it into this.

```js
const transposedSmiley = [
    [0, 1, 1, 0, 0],
    [0, 0, 0, 1, 0],
    [1, 0, 0, 0, 1],
    [0, 0, 0, 0, 1],
    [1, 0, 0, 1, 0],
    [0, 0, 0, 0, 0],
    [0, 1, 1, 0, 0]
];
```
<canvas id="canvas1" class="bdr-3 bdr-red my"></canvas>
<script src="/js/animation-exercise/06-rotation-matrix.js"></script>

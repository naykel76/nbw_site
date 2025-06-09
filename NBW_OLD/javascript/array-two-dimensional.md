# Two Dimensional Array
<!-- TOC -->

- [Overview](#overview)
- [Creating a two dimensional array](#creating-a-two-dimensional-array)
- [A more elegant way](#a-more-elegant-way)
- [Additional Resources](#additional-resources)

<!-- /TOC -->

<a id="markdown-overview" name="overview"></a>

## Overview

A two-dimensional array or matrix, is a data structure that represents a collection of elements
arranged in a grid-like fashion with rows and columns. In simple terms you can think of it as a
table with rows and columns, where each cell contains a value or an element.

In a two-dimensional array, elements are accessed using two indices: one for the row and another
for the column.

```js
matrix['row']['column']
```

```js
const matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

// logs the element at the second row and third column of the matrix.
console.log(matrix[1][2]); // outputs 6
```


<a id="markdown-creating-a-two-dimensional-array" name="creating-a-two-dimensional-array"></a>

## Creating a two dimensional array

```js
let config = { cols: 3, rows: 4 };

// Initialize an empty array to hold the 2D array
let twoDimArray = [];

for (let i = 0; i < config.rows; i++) {
    // Create a new row array for each row iteration
    let row = [];
    // Loop through each column in the current row
    for (let j = 0; j < config.cols; j++) {
        // Push 0 into the current row for each column
        row.push(0);
    }
    // Push the current row into the 2D array
    twoDimArray.push(row);
}

console.table(twoDimArray);
```

<a id="markdown-a-more-elegant-way" name="a-more-elegant-way"></a>

## A more elegant way

```js
let config = { cols: 3, rows: 4 };

return Array.from(
    { length: config.rows }, () => Array(config.cols).fill(0)
);
```

So what just happened?

`Array.from()` is a static method on the `Array` object that creates a new array instance from an
array-like or iterable object.

`{ length: config.rows }` is an object literal that specifies the length of the array to be
created, which is equal to the `config.rows` value. It effectively determines the number of rows
in the 2D array.

`() => Array(config.cols).fill(0)` is an arrow function that gets applied to each element of the
array being created. Inside the function:

`Array(config.cols)` creates a new array with a length of `config.cols`, which corresponds to the
number of columns in each row.

`.fill(0)`: This fills the created array with the value `0`, initializing all cells of the 2D array with 0.

<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

```js
console.log(Array.from('foo'));
// Expected output: Array ["f", "o", "o"]

console.log(Array.from([1, 2, 3], x => x + x));
// Expected output: Array [2, 4, 6]
```

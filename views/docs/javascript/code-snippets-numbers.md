# Javascript Code Snippets - Number

<!-- TOC -->

- [Random number between](#random-number-between)
- [Get the highest or lowest value in an array using `Math.max` and `Math.min`](#get-the-highest-or-lowest-value-in-an-array-using-mathmax-and-mathmin)

<!-- /TOC -->

<a id="markdown-random-number-between" name="random-number-between"></a>

## Random number between

```js
function getRandomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
// Example usage
const randomNumber = getRandomNumber(100, 500);
console.log(randomNumber);
```

<a id="markdown-get-the-highest-or-lowest-value-in-an-array-using-mathmax-and-mathmin" name="get-the-highest-or-lowest-value-in-an-array-using-mathmax-and-mathmin"></a>

## Get the highest or lowest value in an array using `Math.max` and `Math.min`
```js
const numbers = [2, 1, 10, 5, 8, 3, 9];
const highestValue = Math.max(...numbers);
const lowest = Math.min(...numbers);
```

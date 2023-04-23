# Array Techniques

## How to return a random value from an array by index

### JavaScript

You can return a random element from a JavaScript array by generating a random index using the
Math.random() function and using that index to access an element from the array.

```js
const array = ['apple', 'banana', 'orange', 'pear'];
// generate a random index between 0 and the length of the array minus 1
const randomIndex = Math.floor(Math.random() * array.length);
// access the element at the random index
const randomElement = array[randomIndex];
```

### PHP


<!-- ## How to return a random value from an array by index -->

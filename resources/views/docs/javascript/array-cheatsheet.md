# JavaScript Array Methods

<div class="small-headings"></div>

- [Mutating array methods](#mutating-array-methods)
  - [`push(...items):number` - adds to end, returns new length](#pushitemsnumber---adds-to-end-returns-new-length)
  - [`pop():any` - removes last item and returns it](#popany---removes-last-item-and-returns-it)
  - [`unshift(...items):number` - adds items to start, returns new length](#unshiftitemsnumber---adds-items-to-start-returns-new-length)
  - [`shift():any` - removes first item and returns it](#shiftany---removes-first-item-and-returns-it)
  - [`splice(start, deleteCount?, ...items):any[]` - removes and/or adds elements from/at index](#splicestart-deletecount-itemsany---removes-andor-adds-elements-fromat-index)
  - [`reverse():[]` - reverse the array in place](#reverse---reverse-the-array-in-place)
  - [`sort(compareFn?)` - sorts in place](#sortcomparefn---sorts-in-place)
- [Non-mutating methods](#non-mutating-methods)
  - [`concat(...items):[]` - combines arrays or values into a new array](#concatitems---combines-arrays-or-values-into-a-new-array)
  - [`join(separator?):string` - joins all elements of an array into a string](#joinseparatorstring---joins-all-elements-of-an-array-into-a-string)
    - [Why is this parameter optional?](#why-is-this-parameter-optional)
  - [`filter(predicate):[]`: Creates a new array with elements that pass the predicate test](#filterpredicate-creates-a-new-array-with-elements-that-pass-the-predicate-test)
  - [`map(callback):[]` - transforms each element using the callback](#mapcallback---transforms-each-element-using-the-callback)
  - [`reduce(callback, initialValue?):any` - reduces array to a single value using the callback](#reducecallback-initialvalueany---reduces-array-to-a-single-value-using-the-callback)
  - [`every(predicate):boolean` - checks if all elements pass the predicate test](#everypredicateboolean---checks-if-all-elements-pass-the-predicate-test)
  - [`some(predicate):boolean` - checks if any element passes the predicate test](#somepredicateboolean---checks-if-any-element-passes-the-predicate-test)
  - [`find(predicate):any` - finds first element that passes the predicate test](#findpredicateany---finds-first-element-that-passes-the-predicate-test)
  - [`includes(values):boolean` - checks if array includes the value](#includesvaluesboolean---checks-if-array-includes-the-value)
  - [`slice(startIdx?, endIdx?):any[]` - returns a shallow copy of a portion of an array](#slicestartidx-endidxany---returns-a-shallow-copy-of-a-portion-of-an-array)
    - [Why are the slice parameters optional?](#why-are-the-slice-parameters-optional)
  - [`indexOf(value):number` - finds first index of the value, or -1 if not found](#indexofvaluenumber---finds-first-index-of-the-value-or--1-if-not-found)
- [What is a predicate function?](#what-is-a-predicate-function)

## Mutating array methods 
<hr>

### `push(...items):number` - adds to end, returns new length
```js
let fruits = ['apple', 'pear', 'cherry'];
let newLength = fruits.push('orange', 'peach');

console.log(newLength); // Outputs: 6
console.log(fruits); // Outputs: ['apple', 'pear', 'cherry', 'orange', 'peach']
```
<hr>

### `pop():any` - removes last item and returns it
```js
let fruits = ['apple', 'pear', 'cherry'];
let removedItem = fruits.pop();

console.log(removedItem); // Outputs: 'cherry'
console.log(fruits); // Outputs: ['apple', 'pear']
```
<hr>

### `unshift(...items):number` - adds items to start, returns new length
```js
let fruits = ['apple', 'pear', 'cherry'];
let newLength = fruits.unshift('orange', 'peach');

console.log(fruits); // Outputs: ['orange', 'peach', 'apple', 'pear', 'cherry']
console.log(newLength); // Outputs: 6
```
<hr>

### `shift():any` - removes first item and returns it
```js
let fruits = ['apple', 'pear', 'cherry'];
let first = fruits.shift();

console.log(first); // Outputs: apple
console.log(fruits); // Outputs: ['pear', 'cherry']
```
<hr>

### `splice(start, deleteCount?, ...items):any[]` - removes and/or adds elements from/at index

The `splice()` method (not to be confused with `slice`) changes the contents of an array
by removing or replacing existing elements and/or adding new elements in place.

The `slice()` method returns a shallow copy of a portion of an array into a new array
object selected from `start` to `endIndex` (endIndex not included). The original
array will not be modified.

```js
let fruits = ['apple', 'pear', 'cherry'];
let removed = fruits.splice(1, 2, 'citrus'); // Remove pear and cherry, add citrus

console.log(removed); // Outputs: ['pear', 'cherry']
console.log(fruits); // Outputs: ['apple', 'citrus']
```

You can also use the `splice()` method to remove elements from an array without adding new elements. To do this, you simply omit the third argument.

```js
let fruits = ['apple', 'pear', 'cherry'];

let removed = fruits.splice(2, 2); // Remove 'cherry' & 'date'
console.log(fruits); // Outputs: ['apple', 'pear']
console.log(removed); // Outputs: ['cherry']
```

You can also use the `splice()` method to add elements to an array without removing any elements. To do this, you simply omit the second argument.

```js
let fruits = ['apple', 'pear', 'cherry'];

let removed = fruits.splice(2, 0, 'citrus'); // Add 'citrus'
console.log(fruits); // Outputs: ['apple', 'pear', 'citrus', 'cherry']
console.log(removed); // Outputs: []
```
<hr>

### `reverse():[]` - reverse the array in place
```js
const nums = [1, 2, 3, 4, 5];
let reversedNums = nums.reverse(); // mutates, and returns the reversed array

console.log(nums); // Outputs: [5, 4, 3, 2, 1]
console.log(reversedNums); // Outputs: [5, 4, 3, 2, 1]
```
<hr>

### `sort(compareFn?)` - sorts in place

The default sort order is ascending, built upon converting the elements into strings,
then comparing their sequences of UTF-16 code units values.

In plain English, this means that when you use the `sort()` method in JavaScript without
providing a comparison function, it will sort the elements in increasing order. But it
doesn't sort numbers like you might expect (1, 2, 10). Instead, it converts each element
to a string and then sorts them based on the UTF-16 code unit values of the characters
in the strings. This is why '10' comes before '2' in a default sort, because the
character '1' has a lower UTF-16 code unit value than '2'.

```js
const nums = [9, 20, 1, 10, 2];
let sortAscending = nums2.sort();
console.log(sortAscending); // Outputs: [1, 10, 2, 20, 9]
```

To sort numbers in ascending or descending order, you can pass a compare function to the
`sort()` method.

```js
const nums = [9, 20, 1, 10, 2];
// if a-b is negative, a is sorted before b = ascending
let sortAscending = nums2.sort((a, b) => a - b);
console.log(sortAscending); // Outputs: [1, 2, 9, 10, 20]
```

```js
const nums = [9, 20, 1, 10, 2];
// if b-a is negative, a is sorted before b = descending
let sortDescending = nums2.sort((a, b) => b - a);
console.log(sortDescending); // Outputs: [20, 10, 9, 2, 1]
```
<hr>

## Non-mutating methods
<hr>

### `concat(...items):[]` - combines arrays or values into a new array

```js
let fruits = ['apple', 'pear'];
let moreFruits = ['orange', 'peach'];
const newArray = fruits.concat(moreFruits);
console.log(newArray);
// Outputs: ['apple', 'pear', 'orange', 'peach']
```
<hr>

### `join(separator?):string` - joins all elements of an array into a string

```js
const fruits = ['apple', 'banana', 'cherry'];
const str = fruits.join(' ');
console.log(str); // Outputs: 'apple banana cherry'
```
#### <question>Why is this parameter optional?</question>

If it is omitted, the array elements are separated by a comma (,). If you want to join
the elements with no separator, you can call `join()` with no arguments.

```js
const fruits = ['apple', 'banana', 'cherry'];
const str = fruits.join();
console.log(str); // Outputs: 'apple,banana,cherry'
```


<hr>

### `filter(predicate):[]`: Creates a new array with elements that pass the predicate test

```js
let nums = [1, 2, 3, 4, 5];
let filtered = nums.filter(num => num > 2);
console.log(filtered);
// Outputs: [3, 4, 5]
```
<hr>

### `map(callback):[]` - transforms each element using the callback

```js
let nums = [1, 2, 3, 4, 5];
let doubled = nums.map(num => num * 2 );
console.log(doubled);
// Outputs: [2, 4, 6, 8, 10]
```
<hr>

### `reduce(callback, initialValue?):any` - reduces array to a single value using the callback
    
```js
let nums = [1, 2, 3, 4, 5];
let sum = nums.reduce((acc, num) => acc + num, 0);
console.log(sum);
// Outputs: 15
```
<hr>

### `every(predicate):boolean` - checks if all elements pass the predicate test

```js
let nums = [1, 2, 3, 4, 5];
let allGreaterThanZero = nums.every(num => num > 0);
console.log(allGreaterThanZero);
// Outputs: true
```
<hr>

### `some(predicate):boolean` - checks if any element passes the predicate test

```js
let nums = [1, 2, 3, 4, 5];
let someGreaterThanFour = nums.some(num => num > 4);
console.log(someGreaterThanFour);
```
<hr>

### `find(predicate):any` - finds first element that passes the predicate test

```js
let nums = [1, 2, 3, 4, 5];
let firstGreaterThanTwo = nums.find(num => num > 2);
console.log(firstGreaterThanTwo);
// Outputs: 3
```
<hr>

### `includes(values):boolean` - checks if array includes the value

```js
let nums = [1, 2, 3, 4, 5];
let includesThree = nums.includes(3);
console.log(includesThree);
// Outputs: true
```
<hr>

### `slice(startIdx?, endIdx?):any[]` - returns a shallow copy of a portion of an array

```js
let nums = [1, 2, 3, 4, 5];
let sliced = nums.slice(1, 4);
console.log(sliced);
// Outputs: [2, 3, 4]
```

#### <question>Why are the slice parameters optional?</question>

If `startIdx` is omitted, the slice starts from the beginning of the array. If `endIdx`
is omitted, the slice goes through the end of the array. So, you can call `slice()` with
no arguments to make a shallow copy of the entire array. For example:

### `indexOf(value):number` - finds first index of the value, or -1 if not found

```js
let fruits = ['apple', 'banana', 'cherry'];
let index = fruits.indexOf('banana');
console.log(index); // Outputs: 1
```
<hr>

## What is a predicate function?

A predicate function is a function that takes an argument and returns a boolean value.
It is used to test a condition and return `true` or `false` based on the condition.

```js
const isEven = num => num % 2 === 0;
console.log(isEven(2)); // Outputs: true
console.log(isEven(3)); // Outputs: false
```
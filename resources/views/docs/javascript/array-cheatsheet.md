# JavaScript Array Methods

<!-- TOC -->

- [Mutating methods](#mutating-methods)
    - [Quick reference (mutating)](#quick-reference-mutating)
    - [`push(...items): number` (add to end and return new length)](#pushitems-number-add-to-end-and-return-new-length)
    - [`pop(): string` (remove and return last item)](#pop-string-remove-and-return-last-item)
    - [`unshift(...items): number` (add to start and return new length)](#unshiftitems-number-add-to-start-and-return-new-length)
    - [`shift(): string` (remove and return first item)](#shift-string-remove-and-return-first-item)
    - [`splice(start, deleteCount?): string[]`  (remove and add from index)](#splicestart-deletecount-string-br-remove-and-add-from-index)
    - [`reverse()` (mutates and returns the reversed array)](#reverse-mutates-and-returns-the-reversed-array)
    - [`sort(compareFn?: ((a: number, b: number) => number)): number[]`  (mutates and returns the sorted array)](#sortcomparefn-a-number-b-number--number-number-br-mutates-and-returns-the-sorted-array)
- [Non-mutating methods](#non-mutating-methods)
    - [Quick reference (non-mutating)](#quick-reference-non-mutating)
    - [`slice(startIdx?, endIdx?): string[]` (portion of an array as a new array)](#slicestartidx-endidx-string-portion-of-an-array-as-a-new-array)
    - [`array.find(callback): any`](#arrayfindcallback-any)

<!-- /TOC -->

<a id="markdown-mutating-methods" name="mutating-methods"></a>

## Mutating methods

<a id="markdown-quick-reference-mutating" name="quick-reference-mutating"></a>

### Quick reference (mutating)

- `push(...items): number`: Adds new items to the end of an array, and returns the new length.
- `pop(): string`: Removes the last element from an array and returns that element.
- `unshift(...items): number`: Adds one or more elements to the beginning of an array
  and returns the new length.
- `shift(): string`: Removes the first element from an array and returns that removed element.
- `splice()`: Changes the contents of an array by removing or replacing existing
  elements and/or adding new elements in place.
- `reverse()`: Reverses the order of the elements in an array in place.
- `sort()`: Sorts the elements of an array in place and returns the array.

---

<a id="markdown-pushitems-number-add-to-end-and-return-new-length" name="pushitems-number-add-to-end-and-return-new-length"></a>

### `push(...items): number` (add to end and return new length)

```js
let fruits = ['apple', 'pear', 'cherry'];
let newLength = fruits.push('orange', 'peach');

console.log(newLength); // Outputs: 6
console.log(fruits); // Outputs: ['apple', 'pear', 'cherry', 'orange', 'peach']
```

---

<a id="markdown-pop-string-remove-and-return-last-item" name="pop-string-remove-and-return-last-item"></a>

### `pop(): string` (remove and return last item)

```js
let fruits = ['apple', 'pear', 'cherry'];
let removedItem = fruits.pop();

console.log(removedItem); // Outputs: 'cherry'
console.log(fruits); // Outputs: ['apple', 'pear', 'cherry']
```

---


<a id="markdown-unshiftitems-number-add-to-start-and-return-new-length" name="unshiftitems-number-add-to-start-and-return-new-length"></a>

### `unshift(...items): number` (add to start and return new length)

```js
let fruits = ['apple', 'pear', 'cherry'];
let newLength = fruits.unshift('orange', 'peach');

console.log(fruits); // Outputs: ['orange', 'peach', 'apple', 'pear', 'cherry']
console.log(newLength); // Outputs: 6
```

---

<a id="markdown-shift-string-remove-and-return-first-item" name="shift-string-remove-and-return-first-item"></a>

### `shift(): string` (remove and return first item)

The `shift()` method removes the first element from an array and returns that element. This method changes the length of the array.

```js
let fruits = ['apple', 'pear', 'cherry'];
let first = fruits.shift();

console.log(first); // Outputs: apple
console.log(fruits); // Outputs: ['pear', 'cherry']
```

<a id="markdown-splicestart-deletecount-string-br-remove-and-add-from-index" name="splicestart-deletecount-string-br-remove-and-add-from-index"></a>

### `splice(start, deleteCount?): string[]` <br> (remove and add from index)

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




<a id="markdown-reverse-mutates-and-returns-the-reversed-array" name="reverse-mutates-and-returns-the-reversed-array"></a>

### `reverse()` (mutates and returns the reversed array)

```js
const nums = [1, 2, 3, 4, 5];
let reversedNums = nums.reverse(); // mutates, and returns the reversed array

console.log(nums); // Outputs: [5, 4, 3, 2, 1]
console.log(reversedNums); // Outputs: [5, 4, 3, 2, 1]
```


<a id="markdown-sortcomparefn-a-number-b-number--number-number-br-mutates-and-returns-the-sorted-array" name="sortcomparefn-a-number-b-number--number-number-br-mutates-and-returns-the-sorted-array"></a>

### `sort(compareFn?: ((a: number, b: number) => number)): number[]` <br> (mutates and returns the sorted array)

<a href="/docs/javascript/array/sort" target="blank">More Examples</a>

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


<a id="markdown-non-mutating-methods" name="non-mutating-methods"></a>

## Non-mutating methods

<a id="markdown-quick-reference-non-mutating" name="quick-reference-non-mutating"></a>

### Quick reference (non-mutating)

<!-- - `concat()`: Returns a new array comprised of this array joined with other array(s) and/or value(s). -->
<!-- - `join()`: Joins all elements of an array into a string. -->
- `slice(startIdx?, endIdx?): string[]`: Returns a shallow copy of a portion of an array into a new array.
<!-- - `filter()`: Creates a new array with all elements that pass the test implemented by the provided function. -->
<!-- - `map()`: Creates a new array with the results of calling a provided function on every element in the calling array. -->
<!-- - `reduce()`: Apply a function against an accumulator and each element in the array (from left to right) to reduce it to a single value. -->
<!-- - `every()`: Tests whether all elements in the array pass the test implemented by the provided function. -->
<!-- - `some()`: Tests whether at least one element in the array passes the test implemented by the provided function. -->
<!-- - `find()`: Returns the value of the first element in the array that satisfies the provided testing function. -->
<!-- - `findIndex()`: Returns the index of the first element in the array that satisfies the provided testing function. -->
<!-- - `includes()`: Determines whether an array includes a certain value among its entries. -->
<!-- - `indexOf()`: Returns the first (least) index of an element within the array equal to the specified value, or -1 if none is found. -->
<!-- - `lastIndexOf()`: Returns the last (greatest) index of an element within the array equal to the specified value, or -1 if none is found. -->
-

<a id="markdown-slicestartidx-endidx-string-portion-of-an-array-as-a-new-array" name="slicestartidx-endidx-string-portion-of-an-array-as-a-new-array"></a>

### `slice(startIdx?, endIdx?): string[]` (portion of an array as a new array)





<a id="markdown-arrayfindcallback-any" name="arrayfindcallback-any"></a>

### `array.find(callback): any`

The `find()` accepts a callback function as an argument and returns the first element in
an array that satisfies the provided condition. If no element satisfies the condition,
it returns `undefined`.

```js
const array = [5, 12, 8, 130, 44];
const found = array.find(element => element > 10);
console.log(found); // Outputs: 12
```

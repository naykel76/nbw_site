# JavaScript Array Techniques

<!-- TOC -->

- [Array methods (non-mutating)](#array-methods-non-mutating)
    - [`array.filter(predicate: callback): any[]`](#arrayfilterpredicate-callback-any)
    - [`array.map(item => expression)`](#arraymapitem--expression)
    - [`array.join(separator)`](#arrayjoinseparator)
    - [`array.reduce((total, value) => total + value, 0)`](#arrayreducetotal-value--total--value-0)
    - [`array.forEach(item => expression): void`](#arrayforeachitem--expression-void)
- [Useful array actions](#useful-array-actions)
    - [Check existence](#check-existence)
    - [Retrieving values](#retrieving-values)
        - [Get array object by value](#get-array-object-by-value)
        - [Return a random value from an array by index](#return-a-random-value-from-an-array-by-index)
        - [Remove items by value `filter()`](#remove-items-by-value-filter)
    - [Map values between arrays `map()`](#map-values-between-arrays-map)
        - [Maps to another key](#maps-to-another-key)
        - [Map between arrays](#map-between-arrays)
    - [Get {n} highest values in an array `sort()` and `slice()`](#get-n-highest-values-in-an-array-sort-and-slice)

<!-- /TOC -->





<a id="markdown-array-methods-non-mutating" name="array-methods-non-mutating"></a>

## Array methods (non-mutating)

- `concat()`: Returns a new array that is this array joined with other array(s) and/or value(s).
- `slice()`: Extracts a section of the calling array and returns a new array.
- `every()`: Returns true if every element in this array satisfies the provided testing function.
- `some()`: Returns true if at least one element in this array satisfies the provided testing function.
- `indexOf()`: Returns the first index of a value in the array, or -1.
- `findIndex()`: Returns the index of the first element that satisfies a test, or -1.

filter(callback: (element: ElementType, index: number, array: ElementType[]) => boolean): ElementType[]

filter(predicate: (value: any, index: number, array: any[]) => unknown, thisArg?: any): any[]

<a id="markdown-arrayfilterpredicate-callback-any" name="arrayfilterpredicate-callback-any"></a>

### `array.filter(predicate: callback): any[]`

The `filter()` method accepts a predicate callback as an argument and returns the
elements of the array that meet the condition specified in a callback function.

```js
const words = ['spray', 'limit', 'elite', 'exuberant', 'destruction', 'present'];
const longWords = words.filter(word => word.length > 6);
console.log(longWords); // Outputs: ["exuberant", "destruction", "present"]
```

<a id="markdown-arraymapitem--expression" name="arraymapitem--expression"></a>

### `array.map(item => expression)`

The `map()` accepts a callback function as an argument and returns a new array containing
the results of applying the callback function to each element of the original array.

This method can be used instead of a `for` loop to transform an array into another array
of the same length.

```js
const numbers = [1, 4, 9];
const roots = numbers.map(Math.sqrt);
console.log(roots); // Outputs: [1, 2, 3]
```



<a id="markdown-arrayjoinseparator" name="arrayjoinseparator"></a>

### `array.join(separator)`

The `join()` method is used to combine the elements of an array into a single string.
The elements are separated by a specified separator. If no separator is provided, the
elements are separated by a comma.

```js
const words = ['the', 'quick', 'brown', 'fox'];
console.log(newSentence.join(' ');); // Outputs: "the quick brown fox"
console.log(newSentence.join();); // Outputs: "the,quick,brown,fox"
```

<a id="markdown-arrayreducetotal-value--total--value-0" name="arrayreducetotal-value--total--value-0"></a>

### `array.reduce((total, value) => total + value, 0)`

The `reduce()` method in JavaScript is used to reduce the elements of an array into a
single output value. It does this by applying a function to each element in the array,
from left to right, so as to reduce it to a single output value.

```js
reduce(callback, initialValue);
```

The `callback` function you provide to the `reduce` method can take up to four parameters:

1. `accumulator`: This is a running total of the values returned by your callback function.
2. `currentValue`: This is the current element in the array that's being processed.
3. `currentIndex` (optional): This is the index of the current element being processed in the array.
4. `sourceArray` (optional): This is the array that reduce() was called upon.

```js
array.reduce((runningTotal, currentValue, currentIndex, sourceArray) => { }, initialValue);
```

Consider an array `[1, 2, 3, 4, 5]`. We want to find the sum of all elements in the
array. We can use the `reduce()` method for this. The reducer function we'll use is `(a,
b) => a + b`, which takes two arguments `a` and `b`, and returns their sum. The initial
value for the accumulator `a` is `0`.


```js
const array = [1, 2, 3, 4, 5];
const sum = array.reduce((a, b) => a + b, 0);
console.log(sum); // Outputs: 15
```

<a id="markdown-arrayforeachitem--expression-void" name="arrayforeachitem--expression-void"></a>

### `array.forEach(item => expression): void`

The `forEach()` method executes a provided function once for each array element. Unlike
the previous methods, `forEach()` does not return a new array. It simply executes the
provided function for each element in the array.

```js
const array = [1, 2, 3, 4, 5];
array.forEach((item, index) => {
    console.log(`Index: ${index}, Item: ${item}`);
});
```

<a id="markdown-useful-array-actions" name="useful-array-actions"></a>

## Useful array actions

<a id="markdown-check-existence" name="check-existence"></a>

### Check existence

```js
const array = ['apple', 'pear', 'orange'];
const hasApple = array.includes('apple');
```

<a id="markdown-retrieving-values" name="retrieving-values"></a>

### Retrieving values

<a id="markdown-get-array-object-by-value" name="get-array-object-by-value"></a>

#### Get array object by value

```js
const people = [
    {person_id: 1, name: 'John'},
    {person_id: 2, name: 'Jane'},
    {person_id: 3, name: 'Bob'}
];

const jane = people.find(person => person.name === 'Jane');
```


<a id="markdown-return-a-random-value-from-an-array-by-index"
name="return-a-random-value-from-an-array-by-index"></a>

<a id="markdown-return-a-random-value-from-an-array-by-index" name="return-a-random-value-from-an-array-by-index"></a>

#### Return a random value from an array by index

You can return a random element from a JavaScript array by generating a random index
using the Math.random() function and using that index to access an element from the
array.

```js
const array = ['apple', 'pear', 'orange', 'pear'];
// generate a random index between 0 and the length of the array minus 1
const randomIndex = Math.floor(Math.random() * array.length);
// access the element at the random index
const randomElement = array[randomIndex];
```



<a id="markdown-remove-items-by-value-filter" name="remove-items-by-value-filter"></a>

#### Remove items by value `filter()`

Using the `filter()` method to remove items based on a condition:

`const newArray = originalArray.filter(items => items !== valueToRemove);`

```js
let numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// Remove all even numbers
let filteredNumbers = numbers.filter(num => num % 2 !== 0);

let words = ['apple', 'pear', 'carrot', 'grape'];
// Remove the word "carrot"
let filteredWords = words.filter(values => values !== 'carrot');
```

```js
// remove object
const people = [{person_id: 1, name: 'John'}, {person_id: 2, name: 'Jane'}, {person_id: 3, name: 'Bob'}];
const remove = {person_id: 2, name: 'Jane'};

// return new array where not item.id
const newArray = people.filter(values => values.person_id !== id)
```

In this example, we want to remove 'orange' from the array, so we use the `filter()`
method and pass a function as an argument. This function tests each item in the array to
see if it matches the value we want to remove (valueToRemove). If the item does not
match the value, it is added to a new array (newArray) using the filter() method.

You should note a new array containing matching values is returned. The original array
is left untouched.

<a id="markdown-map-values-between-arrays-map" name="map-values-between-arrays-map"></a>

### Map values between arrays `map()`

```js
someArray.map(callback)
```

The `callback` is a function to execute for each element in the array. Its return value
is added as a single element in the new array.


```js
const checkInLog = [
    { date: "22-05-04", venue_id: 306 },
    { date: "22-05-06", venue_id: 305 },
]

const venues = [
    { id: 304, name: 'Greenbank RSL', },
    { id: 305, name: 'Calamvale Hotel', },
];
```

<a id="markdown-maps-to-another-key" name="maps-to-another-key"></a>

#### Maps to another key

```js
const venueNamesAsTitle = venues.map( (item) => title: item.name );
```

<a id="markdown-map-between-arrays" name="map-between-arrays"></a>

#### Map between arrays

```js
const data = checkInLog.map((item) => {
    // from 'venues', return the {venue(s)} where the venue.id from
    // venues array equals the venue_id of the current item.venue_id
    const venue = venues.find((venue) => venue.id === item.venue_id);
    // if the venue exists, then title = venue.name
    const title = venue ? venue.name : 'Unknown Venue';
    return { ...item, title };
});
```

<a id="markdown-get-n-highest-values-in-an-array-sort-and-slice"
name="get-n-highest-values-in-an-array-sort-and-slice"></a>

<a id="markdown-get-n-highest-values-in-an-array-sort-and-slice" name="get-n-highest-values-in-an-array-sort-and-slice"></a>

### Get {n} highest values in an array `sort()` and `slice()`

If you are working with an object of key-value pairs, the first step will be to convert
the object to an array

```js
const someArray = Object.entries(someObject);
```

```js
// Sort the array in descending order based on values
// [i] index of the values to be sorted
const sortedData = someArray.sort((a, b) => b[1] - a[1]);
// Extract the first 5 elements
const highestValues = sortedData.slice(0, 5);

console.log(highestValues);
```


# `sort(): string[]`


<!-- TOC -->

- [Overview](#overview)
- [Sort numbers in ascending order](#sort-numbers-in-ascending-order)
- [Sort numbers in descending order](#sort-numbers-in-descending-order)
- [Sorting strings](#sorting-strings)
- [Sorting objects and strings](#sorting-objects-and-strings)
- [Additional Examples](#additional-examples)
    - [Sort positive integer in ascending order](#sort-positive-integer-in-ascending-order)
- [Additional Resources](#additional-resources)

<!-- /TOC -->

<a id="markdown-overview" name="overview"></a>

## Overview

The `sort()` method sorts the elements of an array in place and returns the sorted
array. The default sort order is ascending, built upon converting the elements into
strings, then comparing their sequences of UTF-16 code units values.

<a id="markdown-sort-numbers-in-ascending-order" name="sort-numbers-in-ascending-order"></a>

## Sort numbers in ascending order

```js
const someArray = [1, 2, 3, 4, 5];
const sortedArray = someArray.sort();
```

<a id="markdown-sort-numbers-in-descending-order" name="sort-numbers-in-descending-order"></a>

## Sort numbers in descending order

you can change the sort order of an array by passing a compare function to the `sort()`
method. By default, `sort()` converts the elements to strings and sorts them in
lexicographical (alphabetical) order, which may not work as expected with numbers or
complex objects.

```js
const someArray = [1, 2, 3, 4, 5];
const sortedArray = someArray.sort((a, b) => b - a);
```

In this code, the compare function `(a, b) => b - a` is passed to `sort()`. This
function gets called with every pair of elements in the array. If the function returns a
positive number, `b` is sorted before `a`. If it returns a negative number, `a` is
sorted before `b`. If it returns 0, `a` and `b` remain in their original order.

<a id="markdown-sorting-strings" name="sorting-strings"></a>

## Sorting strings

```js
const someArray = ['apple', 'banana', 'cherry', 'date'];
const sortedArray = someArray.sort();
```

<a id="markdown-sorting-objects-and-strings" name="sorting-objects-and-strings"></a>

## Sorting objects and strings

```js
const people = [
    {name: 'John', age: 25},
    {name: 'Jane', age: 30},
    {name: 'Bob', age: 20}
];

const sortedPeopleByName = people.sort((a, b) => a.name.localeCompare(b.name));
```

To sort an array of objects by a specific property, such as name, you can use the sort()
function with a custom sorting function. The sorting function should take two arguments,
which represent two elements being compared. It should return a negative number, zero,
or a positive number, depending on whether the first argument should be sorted before,
at the same position, or after the second argument.

<a id="markdown-additional-examples" name="additional-examples"></a>

## Additional Examples

<a id="markdown-sort-positive-integer-in-ascending-order" name="sort-positive-integer-in-ascending-order"></a>

### Sort positive integer in ascending order

```js
function descendingOrder(n) {
    // convert number to string
    const numsString = n.toString();
    // convert string to array
    const numsArray = numsString.split('')
    // sort array in descending order
    const sorted = numsArray.sort((a, b) => b - a)
    // convert array to string and then to number
    return +sorted.join('')
}
console.log(descendingOrder(123456789)); // 987654321
```

Refactored version:

```js
function descendingOrder(n) {
    return +n.toString().split('').sort((a, b) => b - a).join('');
}
```


<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

- <a href="https://www.w3schools.com/js/js_array_sort.asp" target="blank"> W3Schools Array Sort </a>

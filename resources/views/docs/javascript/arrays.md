# JavaScript Array Techniques

<!-- TOC -->

- [Check existence](#check-existence)
- [Retrieving values](#retrieving-values)
    - [Get array object by value](#get-array-object-by-value)
    - [Return a random value from an array by index](#return-a-random-value-from-an-array-by-index)
- [Removing Items](#removing-items)
    - [Basic Methods `splice()`, `pop()` and `shift()`](#basic-methods-splice-pop-and-shift)
    - [Remove items by value `filter()`](#remove-items-by-value-filter)
- [Count duplicate values `reduce()`](#count-duplicate-values-reduce)
    - [Simple array](#simple-array)
    - [Key value pairs](#key-value-pairs)
- [Map values between arrays `map()`](#map-values-between-arrays-map)
    - [Maps to another key](#maps-to-another-key)
    - [Map between arrays](#map-between-arrays)
- [Get {n} highest values in an array `sort()` and `slice()`](#get-n-highest-values-in-an-array-sort-and-slice)
- [Reverse an array](#reverse-an-array)

<!-- /TOC -->


<a id="markdown-check-existence" name="check-existence"></a>

## Check existence

```js
const array = ['apple', 'banana', 'orange'];
const hasApple = array.includes('apple');
```




<a id="markdown-retrieving-values" name="retrieving-values"></a>

## Retrieving values

<a id="markdown-get-array-object-by-value" name="get-array-object-by-value"></a>

### Get array object by value

```js
const people = [{person_id: 1, name: 'John'}, {person_id: 2, name: 'Jane'}, {person_id: 3, name: 'Bob'}];
const jane = people.find(person => person.name === 'Jane');
```


<a id="markdown-return-a-random-value-from-an-array-by-index" name="return-a-random-value-from-an-array-by-index"></a>

### Return a random value from an array by index

You can return a random element from a JavaScript array by generating a random index using the
Math.random() function and using that index to access an element from the array.

```js
const array = ['apple', 'banana', 'orange', 'pear'];
// generate a random index between 0 and the length of the array minus 1
const randomIndex = Math.floor(Math.random() * array.length);
// access the element at the random index
const randomElement = array[randomIndex];
```

<a id="markdown-removing-items" name="removing-items"></a>

## Removing Items

<a id="markdown-basic-methods-splice-pop-and-shift" name="basic-methods-splice-pop-and-shift"></a>

### Basic Methods `splice()`, `pop()` and `shift()`

```js
let fruits = ['apple', 'banana', 'cherry', 'date'];

fruits.splice(1, 1);    // Remove the item at index 1 (banana)
fruits.pop();           // Remove the last item (date)
fruits.shift();         // Remove the first item (apple)
```

<a id="markdown-remove-items-by-value-filter" name="remove-items-by-value-filter"></a>

### Remove items by value `filter()`

Using the `filter()` method to remove items based on a condition:

`const newArray = originalArray.filter(items => items !== valueToRemove);`

```js
let numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// Remove all even numbers
let filteredNumbers = numbers.filter(num => num % 2 !== 0);

let words = ['apple', 'banana', 'carrot', 'grape'];
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

In this example, we want to remove 'orange' from the array, so we use the `filter()` method and
pass a function as an argument. This function tests each item in the array to see if it matches
the value we want to remove (valueToRemove). If the item does not match the value, it is added to
a new array (newArray) using the filter() method.

You should note a new array containing matching values is returned. The original array is left
untouched.


<a id="markdown-count-duplicate-values-reduce" name="count-duplicate-values-reduce"></a>

## Count duplicate values `reduce()`

<a id="markdown-simple-array" name="simple-array"></a>

### Simple array

```js
const someArray = ['a', 'b', 'c', 'c', 'b', 'd'];
const numElements = someArray.reduce((count, item) => {
  count[item] = count[item] + 1 || 1;
  return count;
}, {});
```

The `reduce()` method takes two arguments: a `callback` function and an `initial` value (in this
case, an empty object {}). The callback function takes two parameters: count (the accumulator) and
item (the current element being iterated over).

**Within the callback function, we perform the following steps:**

1. `count[item] = count[item] + 1 || 1;`: We access the property in the count object corresponding to
the item. If the property doesn't exist, we initialize it to 1. If the property already exists, we
increment its value by 1.

2. `return count;`: We return the updated `count` object to be used as the accumulator in the next iteration.

After the `reduce()` method completes, the `numElements` object will contain the count of
occurrences for each unique element in the someArray.

<a id="markdown-key-value-pairs" name="key-value-pairs"></a>

### Key value pairs

```js
const someArray = [ { key: 'a', value: 1 }, { key: 'b', value: 2 }, { key: 'c', value: 3 }, { key: 'c', value: 4 }, { key: 'b', value: 5 }, { key: 'd', value: 6 }, ];

const elementCounts = someArray.reduce((count, item) => {
  const { key, value } = item;
  count[key] = count[key] ? count[key] + value : value;
  return count;
}, {});

console.log(elementCounts);
```

<a id="markdown-map-values-between-arrays-map" name="map-values-between-arrays-map"></a>

## Map values between arrays `map()`

```js
someArray.map(callback)
```

The `callback` is a function to execute for each element in the array. Its return value is added
as a single element in the new array.


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

### Maps to another key

```js
const venueNamesAsTitle = venues.map( (item) => title: item.name );
```

<a id="markdown-map-between-arrays" name="map-between-arrays"></a>

### Map between arrays

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

<a id="markdown-get-n-highest-values-in-an-array-sort-and-slice" name="get-n-highest-values-in-an-array-sort-and-slice"></a>

## Get {n} highest values in an array `sort()` and `slice()`

If you are working with an object of key-value pairs, the first step will be to convert the object to an array

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

<a id="markdown-reverse-an-array" name="reverse-an-array"></a>

## Reverse an array

```js
const someArray = [1, 2, 3, 4, 5];
const reversedArray = someArray.reverse();
```


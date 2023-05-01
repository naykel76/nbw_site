# JavaScript Array Techniques

<!-- MarkdownTOC -->

- [Retrieving values](#retrieving-values)
    - [Get array object by value](#get-array-object-by-value)
    - [Return a random value from an array by index](#return-a-random-value-from-an-array-by-index)
    - [Get the lowest value](#get-the-lowest-value)
- [Removing Items](#removing-items)
    - [Remove items by value `array.filter()`](#remove-items-by-value-arrayfilter)

<!-- /MarkdownTOC -->

<a id="retrieving-values"></a>
## Retrieving values

<a id="get-array-object-by-value"></a>
### Get array object by value

```js
const people = [{person_id: 1, name: 'John'}, {person_id: 2, name: 'Jane'}, {person_id: 3, name: 'Bob'}];
const jane = people.find(person => person.name === 'Jane');
```

<a id="return-a-random-value-from-an-array-by-index"></a>
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

### Get the lowest value

 how can i get the lowest value in an array of objects?


<a id="removing-items"></a>
## Removing Items

<a id="remove-items-by-value-arrayfilter"></a>
### Remove items by value `array.filter()`

```js
const originalArray = ['apple', 'banana', 'orange', 'pear'];
const valueToRemove = 'orange';

const newArray = originalArray.filter(item => item !== valueToRemove);

// remove object
const people = [{person_id: 1, name: 'John'}, {person_id: 2, name: 'Jane'}, {person_id: 3, name: 'Bob'}];
const remove = {person_id: 2, name: 'Jane'};

const newArray = people.filter(item => item.person_id !== id)
```


In this example, we want to remove 'orange' from the array, so we use the `filter()` method and
pass a function as an argument. This function tests each item in the array to see if it matches
the value we want to remove (valueToRemove). If the item does not match the value, it is added to
a new array (newArray) using the filter() method.

You should note a new array containing matching values is returned. The original array is left
untouched.

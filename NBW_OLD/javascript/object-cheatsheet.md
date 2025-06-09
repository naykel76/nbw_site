# Javascript Objects Cheatsheet

<div class="small-headings"></div>

- [Overview](#overview)
- [Accessing properties](#accessing-properties)
- [Object methods](#object-methods)
  - [`Object.keys(obj)` - returns an array of a given object's own property names](#objectkeysobj---returns-an-array-of-a-given-objects-own-property-names)
  - [`Object.values(obj)` - returns an array of a given object's own property values](#objectvaluesobj---returns-an-array-of-a-given-objects-own-property-values)
  - [`Object.entries(obj)` - returns an array of a given object's own enumerable property \[key, value\] pairs](#objectentriesobj---returns-an-array-of-a-given-objects-own-enumerable-property-key-value-pairs)
- [Object destructuring](#object-destructuring)
- [Techniques for working with objects](#techniques-for-working-with-objects)
  - [Delete a property from an object](#delete-a-property-from-an-object)
  - [Check if a property exists in an object](#check-if-a-property-exists-in-an-object)
  - [Merge two objects](#merge-two-objects)
  - [Clone an object (shallow copy)](#clone-an-object-shallow-copy)
- [Techniques for working with arrays of objects](#techniques-for-working-with-arrays-of-objects)
- [Removing an Object from an Array](#removing-an-object-from-an-array)
    - [Non-mutating Method: `filter`](#non-mutating-method-filter)
    - [Mutating Method: `splice`](#mutating-method-splice)
  - [Find item by key](#find-item-by-key)
  - [Find item by value](#find-item-by-value)
  - [Find all items by key](#find-all-items-by-key)
  - [Update an existing item in an array of objects](#update-an-existing-item-in-an-array-of-objects)

## Overview

Objects are:

- **mutable** so any changes made to the object will be reflected in the original object.
- **unordered** so the order of the properties in an object is not guaranteed
- **dynamic** so you can add, update, and delete properties from an object
- **iterable** so you can loop through the properties of an object using a for...in loop

Objects can be converted to a:

- **string** by calling the `toString` method on the object
- **JSON string** by calling the `JSON.stringify` method on the object
- **JavaScript object** by calling the `JSON.parse` method on the JSON string
- **number** by calling the `valueOf` method on the object (only works for certain objects like Date)

<hr>

## Accessing properties

There are two ways to access properties of an object:

**Dot notation** is shorter and easier to read, and is generally preferred when you know
the name of the property you're trying to access.

**Bracket notation** is more flexible because it can take any string expression,
including variables. This is useful when you need to access a property dynamically, or
when the property name is not a valid identifier (e.g., it includes spaces or special
characters), or when the property name is a reserved word.

```js
const person = { firstname: "Mike", lastname: "Dingle", age: 30 };
const firstname = person.firstname;     // Output: Mike
const lastname = person['lastname'];    // Output: Dingle
```
<hr>

## Object methods

### `Object.keys(obj)` - returns an array of a given object's own property names

```js
const person = { firstname: "Mike", lastname: "Dingle", age: 30 };
const keys = Object.keys(person); // Output: ['firstname', 'lastname', 'age']
```
<hr>
 
### `Object.values(obj)` - returns an array of a given object's own property values

```js
const person = { firstname: "Mike", lastname: "Dingle", age: 30 };
const values = Object.values(person); // Output: ['Mike', 'Dingle', 30]
```
<hr>

### `Object.entries(obj)` - returns an array of a given object's own enumerable property [key, value] pairs

```js
const person = { firstname: "Mike", lastname: "Dingle", age: 30 };
const entries = Object.entries(person); // Output: [['firstname', 'Mike'], ['lastname', 'Dingle'], ['age', 30]]
```
<hr>
<!-- ### `Object.keys(obj): string[]` - returns an array of a given object's own property names
### `Object.values(obj): any[]` - returns an array of a given object's own property values
### `Object.entries(obj): [string, any][]` - returns an array of a given object's own enumerable property [key, value] pairs -->

## Object destructuring

Object destructuring is a way to extract multiple properties from an object and assign them to variables.

```js
const person = { firstname: "Mike", lastname: "Dingle", age: 30 };
const { firstname, lastname, age } = person;
console.log(firstname, lastname); // Output: Mike Dingle
```
<hr>

## Techniques for working with objects

### Delete a property from an object

```js
const person = { firstname: "Mike", lastname: "Dingle", age: 30 };
delete person.age;
console.log(person); // Output: { firstname: 'Mike', lastname: 'Dingle' }
```
<hr>

### Check if a property exists in an object

```js
const person = { firstname: "Mike", lastname: "Dingle", age: 30 };
const hasAge = person.hasOwnProperty('age');
console.log(hasAge); // Output: true
```
<hr>

### Merge two objects

```js
const person = { firstname: "Mike", lastname: "Dingle" };
const address = { city: "New York", country: "USA" };
const merged = { ...person, ...address };
console.log(merged); // Output: { firstname: 'Mike', lastname: 'Dingle', city: 'New York', country: 'USA' }
```
<hr>

### Clone an object (shallow copy)

```js
const person = { firstname: "Mike", lastname: "Dingle" };
const clone = { ...person };
console.log(clone); // Output: { firstname: 'Mike', lastname: 'Dingle' }
```
<hr>

## Techniques for working with arrays of objects

```html +parse
<x-alert type="info">
All the following examples use the `people` array of objects defined below.
</x-alert>
```

```js
const people = [
    { id: 1, name: 'John', age: 30, hobbies: ['reading', 'gaming', 'coding'] },
    { id: 2, name: 'Jane', age: 25, hobbies: ['painting', 'running', 'cooking'] },
    { id: 3, name: 'Bob', age: 35, hobbies: ['swimming', 'coding', 'hiking'] }
];
```
<hr>

## Removing an Object from an Array

You can remove an object from an array using either a non-mutating method (`filter`) or
a mutating method (`splice`).

#### Non-mutating Method: `filter`
This method returns a new array excluding the object that matches the specified
condition. It works by using the `filter` method to create a new array that includes
only the items that do not match the specified condition.

```js
const removePersonById = (people, id) => people.filter(person => person.id !== id);

const updatedPeople = removePersonById(people, 2);
console.log(updatedPeople);
```

#### Mutating Method: `splice`
This method removes the object directly from the original array. It works by using the
`findIndex` method to get the index of the object to be removed, and then using the
`splice` method to remove it from the array.

```js
const removePersonById = (people, id) => {
    const index = people.findIndex(person => person.id === id);
    if (index !== -1) {
        people.splice(index, 1);
    }
};

removePersonById(people, 2);
console.log(people);
```
<hr>

### Find item by key

```js
const findPersonById = (people, id) => {
    return people.find(person => person.id === id);
};

const person = findPersonById(people, 2);
console.log(person);
// Output: { id: 2, name: 'Jane', age: 25, hobbies: ['painting', 'running', 'cooking'] }
```
<hr>

### Find item by value

```js
const findPersonByHobby = (people, hobby) => {
    return people.find(person => person.hobbies.includes(hobby));
};

const person = findPersonByHobby(people, 'running');
console.log(person); 
// Output: { id: 2, name: 'Jane', age: 25, hobbies: ['painting', 'running', 'cooking'] }
```
<hr>

### Find all items by key

```js
const findPeopleByAge = (people, age) => {
    return people.filter(person => person.age === age);
};

const people = findPeopleByAge(people, 30);
console.log(people); 
// Output: [ { id: 1, name: 'John', age: 30, hobbies: ['reading', 'gaming', 'coding'] } ]
```
<hr>

### Update an existing item in an array of objects

```js
const updatePersonById = (people, id, data) => {
    return people.map(person => {
        if (person.id === id) {
            return { ...person, ...data };
        }
        return person;
    });
};

const updatedPeople = updatePersonById(people, 2, { name: 'Janet' });
console.log(updatedPeople);
```

This function uses the `map` method to iterate over the `people` array and update the
object with the specified `id` by merging the existing object with the `data` object.

# Objects
<!-- TOC -->

- [Overview](#overview)
- [Accessing properties](#accessing-properties)
- [Working with multiple objects](#working-with-multiple-objects)

<!-- /TOC -->


<a id="markdown-overview" name="overview"></a>

## Overview

Objects are:

- **mutable** so any changes made to the object will be reflected in the original object.
- **unordered** so the order of the properties in an object is not guaranteed
- **dynamic** so you can add, update, and delete properties from an object
- **iterable** so you can loop through the properties of an object using a for...in loop

<!--
- extensible so you can add new properties to an object at runtime
- pass by reference so when you pass an object to a function you are passing a reference to the object and not the object itself
- compared by reference so when you compare two objects you are comparing their references and not their values
- copied by reference so when you copy an object you are copying its reference and not the object itself
- stored by reference so when you store an object in a variable you are storing a reference to the object and not the object itself
- accessed by reference so when you access a property of an object you are accessing it by reference and not by value -->

Objects can be converted to a:

- **string** by calling the `toString` method on the object
- **JSON string** by calling the `JSON.stringify` method on the object
- **JavaScript object** by calling the `JSON.parse` method on the JSON string
- **number** by calling the `valueOf` method on the object (only works for certain objects like Date). `Why?`

---

<a id="markdown-accessing-properties" name="accessing-properties"></a>

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
<a id="markdown-working-with-multiple-objects" name="working-with-multiple-objects"></a>

## Working with multiple objects

```js
const people = [
    { id: 1, name: 'John', age: 30, hobbies: ['reading', 'gaming', 'coding'] },
    { id: 2, name: 'Jane', age: 25, hobbies: ['painting', 'running', 'cooking'] },
    { id: 3, name: 'Bob', age: 35, hobbies: ['swimming', 'coding', 'hiking'] }
];
```


<!--
<a id="markdown-find-item-by-key" name="find-item-by-key"></a>

### Find item by key

```js
const data = {
  item1: { id: 1, name: 'Sample Item 1' },
  item2: { id: 2, name: 'Sample Item 2' },
  item3: { id: 3, name: 'Sample Item 3' },
};

const key = 'item2';
const item = data.hasOwnProperty(key) ? data[key] : null;
```


<a id="markdown-find-item-by-value" name="find-item-by-value"></a>

## Find item by value

```js
const data = {
  item1: { id: 1, name: 'Sample Item 1' },
  item2: { id: 2, name: 'Sample Item 2' },
  item3: { id: 3, name: 'Sample Item 3' },
};

const value = 'Sample Item 2';
const item = Object.values(data).find(item => item.name === value);
``` -->

# What is JavaScript Object Literal?

JavaScript Object Literal is a syntax for defining objects in JavaScript. It allows the creation of
objects using a simple and concise notation of key-value pairs, making it an efficient and readable
way to structure and store related data.

- Object literals are straightforward to write, read, and understand.
- They provide a lightweight way to create objects without the need for explicit class definitions.
- Object literals can store any type of data, including other objects, arrays, and functions.

## Object Literal Example

Object literals are a common data structure in JavaScript used to store collections of data or
represent complex structures. They can include various data types, including other objects, arrays,
and functions.

Object literals are written in the form of key-value pairs, where each key is a string and each
value can be any valid JavaScript data type. For example, the following object literal stores
information about a person:

```js
const person = {
    name: 'John Doe',
    age: 30,
    address: '123 Main Street',
    greet: function() {
        console.log('Hello, my name is ' + this.name);
    }
};
```

```html +parse
<x-alert type="info">
Object literals can also include functions, which can operate on the object's data.
</x-alert>
```

## Object Literal Syntax

It can be confusing to return an object literal directly from an arrow function in JavaScript. To
return an object literal directly from an arrow function, you need to wrap the object literal in
parentheses `()` to avoid ambiguity with the function body. Here are some examples:

```js
() => ({ key: 'value' })
```

```js
() => {
    // some logic here
    return { key: 'value' };
}
```

# JavaScript Fundamentals Quick Reference

- [Variable scope](#variable-scope)
- [Data types](#data-types)
  - [Primitive data types](#primitive-data-types)
  - [Things to remember](#things-to-remember)
- [Operators](#operators)
  - [Things to remember](#things-to-remember-1)
    - [Falsy](#falsy)
    - [Logical operators `||` and `??`](#logical-operators--and-)
- [Control structures](#control-structures)
  - [Things to remember](#things-to-remember-2)
- [Glossary](#glossary)

<hr>

<div class="spaced-out-all"></div>

## Variable scope

- `var` - Declares a variable, optionally initializing it to a value. It's scoped to the nearest function block.
- `let` - Declares a block-scoped local variable, optionally initializing it to a value.
- `const` - Declares a block-scoped, read-only named constant. The variable cannot be reassigned after initialization.
<hr>

## Data types

### Primitive data types

- `Number`: numeric values (`1`, `3.14`, `NaN`)
- `String`: textual data (`'hello'`, `"world"`, `"51"`)
- `Boolean`: `true` and `false` or `0` and `1`
- `Undefined`: a variable that has been declared but not assigned a value
- `Null`: an intentional absence of any object value
- `Falsy`: values that evaluate to false in a Boolean context: `false`, `0`, `''`, `NaN`, `null`, `undefined`
- nullish: `null` and `undefined`
<hr>

### Things to remember

- `NaN` is also number.
- `null`, `undefined`, `NaN`, they are all `falsy`
- `false`, `0`, `""`, and `document.all` are also `falsy`
- "nullish" refers to two specific values: `null` and `undefined`. They are considered "nullish"
  because they represent the absence of a value or no value at all.
- Return first no nullish value or the last value.
  
<!-- ### Non-primitive data types -->

<!-- **Non-Primitive Types:** `Object`, `Function`, `Array`, `Date`, `RegExp`, `Map`, `Set`, `Promise`, `Error` -->

<!-- - `Object`: Represents a collection of key-value pairs
- `Array`: Represents a list of elements
- `Function`: Represents a function
- `Date`: Represents a date and time
- `RegExp`: Represents a regular expression
- `Map` (ES6+): Represents a collection of key-value pairs
- `Set` (ES6+): Represents a collection of unique values
- `WeakMap` (ES6+): Represents a collection of key-value pairs where the keys are weakly referenced
- `WeakSet` (ES6+): Represents a collection of unique values where the values are weakly referenced -->
<hr>

## Operators

- Logical Operators: `&&` (AND), `||` (OR), `!` (NOT), `??` (Nullish Coalescing)
- Conditional Operator: `?:` (Ternary)
- Type Operators: `typeof`, `instanceof`
- Arithmetic Operators: `+`, `-`, `*`, `/`, `%`, `++`, `--`
- Assignment Operators: `=`, `+=`, `-=`, `*=`, `/=`, `%=`
- Comparison Operators: `==`, `===`, `!=`, `!==`, `>`, `<`, `>=`, `<=`
- Bitwise Operators: `&`, `|`, `^`, `~`, `<<`, `>>`, `>>>`
<hr>

### Things to remember

- `==` compares the values, `===` compares the values and types.
- `&&` returns the first falsy value or the last value.
- `||` returns the first truthy value or the last value.
- `??` returns the first no nullish value or the last value.
- `typeof` returns the type of a variable.
- `instanceof` returns true if an object is an instance of a class.
<hr>

#### Falsy

- `false` and `falsy` **are not exactly** the same thing. 
- `Falsy` refers to values that evaluate to `false` in a boolean context. These include
  `0`, `""`, `null`, `undefined`, and `NaN`.
- `false` is a boolean value.
- `false` is always `falsy`, but not everything that's `falsy` is `false`. 😜
<hr>

#### Logical operators `||` and `??`

- `||` returns the first truthy value or the last if all are falsy.
- `??` returns the first non-nullish value or the last if all are nullish.

```js
// Logical OR (||) operator
console.log(false || true);        // Output: true
console.log(false || false);       // Output: false
console.log('' || 'Hello');        // Output: 'Hello'
console.log(0 || 1);               // Output: 1

// Nullish coalescing (??) operator
console.log(null ?? 'Hello');      // Output: 'Hello'
console.log(undefined ?? 'World'); // Output: 'World'
console.log('' ?? 'Hello');        // Output: ''
console.log(0 ?? 1);               // Output: 0
```
<hr>

## Control structures

- `if` - Executes a block of code if the condition is true.
- `else` - Executes a block of code if the condition is false.
- `else if` - Executes a block of code if the previous condition is false.
- `switch` - Selects one of many code blocks to be executed.
- `for` - Loops through a block of code a number of times.
- `while` - Loops through a block of code while the condition is true.
- `do while` - Loops through a block of code once, and then repeats the loop while the condition is true.
- `break` - Exits a loop or a switch block.
- `continue` - Jumps out of a loop and starts at the top.
<hr>

### Things to remember

- `for...in` - Iterates over the keys (property names) of an object.
- `for...of` - Iterates over the **values** of an iterable object.
- `break` - Exits the loop immediately.
- `continue` - Skips the current iteration and continues with the next one.

```js
const lettersArray = ['a', 'b', 'c', 'd', 'e'];
for (const v in lettersArray) console.log(v); // 0, 1, 2, 3, 4
for (const v of lettersArray) console.log(v); // a, b, c, d, e
```

```js
const object = { a: 10, b: 20, c: 30 };
for (let key in object) console.log(key); // Outputs: 'a', 'b', 'c'
for (let value of Object.values(object)) console.log(value); // Outputs: 10, 20, 30
```
<hr>

## Glossary

- **enumerable** - A property that can be iterated over using a `for...in` loop.
- **event** **loop** - A mechanism that allows JavaScript to perform non-blocking I/O operations.
- **hoisting** - The process of moving variable and function declarations to the top of their containing scope during the compilation phase.
- **promise** - An object representing the eventual completion or failure of an asynchronous operation.
- **prototype** - An object that is associated with every function and object by default in JavaScript.
- **strict** **mode** - A way to opt into a restricted variant of JavaScript.



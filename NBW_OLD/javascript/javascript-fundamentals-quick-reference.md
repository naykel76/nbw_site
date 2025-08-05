# JavaScript Fundamentals Quick Reference

This quick reference provides an overview of essential JavaScript concepts and
syntax. You will not find coded examples in this quick reference, you will only
find method signatures, data types, and operator syntax. For examples refer to
the links in the sidebar.

<!-- Examples can be found -->

- [Variable scope](#variable-scope)
- [Data types](#data-types)
  - [Primitive data types](#primitive-data-types)
  - [Things to remember](#things-to-remember)
    - [Falsy](#falsy)
- [Operators](#operators)
  - [Logical and Comparison Operators](#logical-and-comparison-operators)
  - [Arithmetic and Assignment Operators](#arithmetic-and-assignment-operators)
  - [Type Operators](#type-operators)
  - [Operator Usage](#operator-usage)
  - [Things to remember](#things-to-remember-1)
- [Control structures](#control-structures)
  - [Things to remember](#things-to-remember-2)
- [Array Signatures](#array-signatures)
  - [Mutating Methods](#mutating-methods)
  - [Mutating Methods](#mutating-methods-1)
- [Objects](#objects)
- [Destructuring Objects and Arrays](#destructuring-objects-and-arrays)
- [Conversions](#conversions)
- [Functions](#functions)
  - [Function Methods](#function-methods)
  - [Function Properties](#function-properties)
- [Regular Expressions](#regular-expressions)
- [String Methods](#string-methods)
- [number Methods](#number-methods)
- [Glossary](#glossary)

<div class="spaced-out-all"></div>

## Variable scope

- `var` - Function-scoped, can be re-declared and updated within its scope. Hoisted to top of its scope.
- `let` - Block-scoped, can be updated but not re-declared within its block.
- `const` - Block-scoped, cannot be updated or re-declared. Used for constants.
<hr>

## Data types

### Primitive data types

```bash +torchlight-bash
Number      # numeric values (1, 3.14, NaN)
String      # textual data ('hello', "world", "51")
Boolean     # true and false or 0 and 1
undefined   # a variable that has been declared but not assigned a value
null        # an intentional absence of any object value
falsy       # false, 0, '', NaN, null, undefined
nullish     # null or undefined
```

### Things to remember

- A `string` is an array of characters.
- `null`, `undefined`, `NaN`, they are all `falsy`
- `false`, `0`, `""`, and `document.all` are also `falsy`
- `NaN` is also a number, and is not equal to any value, including itself.
- `null` is an intentional absence of any object value.
- `nullish` refers to two specific values: `null` and `undefined`. They are
  considered "nullish" because they represent the absence of a value or no value
  at all.
- `undefined` is a variable that has been declared but not assigned a value.

#### Falsy

- `false` and `falsy` **are not exactly** the same thing. 
- `falsy` refers to values that evaluate to `false` in a boolean context. These include
  `0`, `""`, `null`, `undefined`, and `NaN`.
- `false` is always `falsy`, but not everything that's `falsy` is `false`. 😜
<hr>

## Operators

### Logical and Comparison Operators
```bash +torchlight-bash
# Logical Operators
&& (AND)                     # First falsy or last truthy
|| (OR)                      # First truthy or last falsy
!  (NOT)                     # Opposite boolean
?? (Nullish Coalescing)      # First non-nullish or last nullish
# Comparison Operators
==  (Equal)                  # Compares two values for equality
=== (Strict Equal)           # Compares two values for equality and type
!=  (Not Equal)              # Compares two values for inequality
!== (Strict Not Equal)       # Compares two values for inequality and type
>   (Greater Than)           # Compares two values if the left is greater than the right
<   (Less Than)              # Compares two values if the left is less than the right
>=  (Greater Than or Equal)  # Compares two values if the left is greater or equal to the right
<=  (Less Than or Equal)     # Compares two values if the left is less or equal to the right
```

### Arithmetic and Assignment Operators
```bash +torchlight-bash
# Arithmetic Operators
+   (Addition)               # Adds two operands
-   (Subtraction)            # Subtracts two operands
*   (Multiplication)         # Multiplies two operands
/   (Division)               # Divides two operands
%   (Modulus)                # Returns the division remainder
++  (Increment)              # Increases the value of a variable by 1
--  (Decrement)              # Decreases the value of a variable by 1
# Assignment Operators
=   (Assignment)             # Assigns a value to a variable
+=  (Addition)               # Adds a value and assigns it to a variable
-=  (Subtraction)            # Subtracts a value and assigns it to a variable
*=  (Multiplication)         # Multiplies a value and assigns it to a variable
/=  (Division)               # Divides a value and assigns it to a variable
%=  (Modulus)                # Returns the division remainder and assigns it to a variable
```

### Type Operators
```bash +torchlight-bash
typeof                      # returns the type of a variable
instanceof                  # returns true if an object is an instance of a class
```

### Operator Usage
```bash +torchlight-bash
||  # returns the first truthy value or the last if all are falsy
??  # returns the first non-nullish value or the last if all are nullish
```

### Things to remember

- `==` compares the values, `===` compares the values and types.
- `&&` returns the first falsy value or the last value.
- `||` returns the first truthy value or the last value.
- `??` returns the first no nullish value or the last value.
- `typeof` returns the type of a variable.
- `instanceof` returns true if an object is an instance of a class.
<hr>

## Control structures

```js
if          // Executes a block of code if the condition is true.
else        // Executes a block of code if the condition is false.
else if     // Executes a block of code if the previous condition is false.
switch      // Selects one of many code blocks to be executed.
for         // Loops through a block of code a number of times.
while       // Loops through a block of code while the condition is true.
do while    // Loops through a block of code once, and then repeats the loop while the condition is true.
break       // Exits a loop or a switch block.
continue    // Jumps out of a loop and starts at the top.
```

### Things to remember

- `for...in` - Iterates over the keys (property names) of an object.
- `for...of` - Iterates over the **values** of an iterable object.
- `break` - Exits the loop immediately.
- `continue` - Skips the current iteration and continues with the next one.


## Array Signatures

### Mutating Methods
```js
push(...items): number    // adds to end, returns new length
pop(): any                // removes last item and returns it
unshift(...items): number // adds items to start, returns new length
shift(): any              // removes first item and returns it
reverse(): []             // reverse the array in place
sort(compareFn ?)         // sorts in place
splice(start, delCount ?, ...items): any[]  // removes and/or adds elements from/at index
```

### Mutating Methods
```js
concat(...items): []                    // combines arrays or values into a new array
join(separator ?): string               // joins all elements of an array into a string
filter(predicate): []:                  // Creates a new array with elements that pass the predicate test
map(callback): []                       // transforms each element using the callback
reduce(callback, initialValue ?): any   // reduces array to a single value using the callback
every(predicate): boolean               // checks if all elements pass the predicate test
some(predicate): boolean                // checks if any element passes the predicate test
find(predicate): any                    // finds first element that passes the predicate test
includes(values): boolean               // checks if array includes the value
slice(startIdx ?, endIdx ?): any[]      // returns a shallow copy of a portion of an array
indexOf(value): number                  // finds first index of the value, or -1 if not found
```

## Objects
```js
Object.keys(obj): string[]              // returns object's keys
Object.values(obj): any[]               // returns object's values
Object.entries(obj): [string, any][]    // returns object's key-value pairs
```

## Destructuring Objects and Arrays

```js
const { key1, key2 } = obj;                 // extracts key1 and key2 from obj
const [first, second] = ['fish',  'cake'];  // extracts first and second from array
```

## Conversions

```js
Number('123')   // converts string to number
String(123)     // converts number to string
Boolean(0)      // converts number to boolean
```

## Functions

```js
function name(param1, param2) { ... }       // function declaration
const name = (param1, param2) => { ... }    // arrow function
```

### Function Methods

`this` refers to the object a function is part of. `call`, `apply`, and `bind`
let you set `this` manually. For example, `greet.call(person, 'Hello')` calls
`greet` with `this` set to `person`. This is useful when you want a function to
work with a different object.

```js
// think of `this` as the object the function is part of. For example, `person.greet()`

fn.call(this, arg1, arg2)   // calls function with given `this` and arguments
fn.apply(this, [args])      // like call, but takes an array of arguments
fn.bind(this, arg1, arg2)   // returns a new function with bound `this` and arguments
```

### Function Properties

```js
fn.length   // returns the number of arguments expected by the function
fn.name     // returns the name of the function
```

## Regular Expressions

```js
// RegExp methods
/regex/.test(string): boolean   // returns true if the pattern is found in the string
/regex/.exec(string): [string]  // returns an array of matched strings

// String methods for regex
str.match(/regex/): [string]    // returns an array of matched strings
str.search(/regex/): number     // returns the index of the first match, or -1 if not found
str.replace(/regex/, newSubstr): string  // replaces matched substrings with newSubstr
```

## String Methods

```js
charAt(index): string           // returns the character at the specified index
substring(start, end): string   // extracts the characters from a string, between two specified indices
toLowerCase(): string           // converts a string to lowercase letters
toUpperCase(): string           // converts a string to uppercase letters
trim(): string                  // removes whitespace from both ends of a string
```

## number Methods

```js
toFixed(digits): string         // returns a string representing the number with a fixed number of digits
toPrecision(precision): string  // returns a string representing the number to a specified precision
```

## Glossary

- **enumerable** - A property that can be iterated over using a `for...in` loop.
- **event** **loop** - A mechanism that allows JavaScript to perform non-blocking I/O operations.
- **hoisting** - The process of moving variable and function declarations to the top of their containing scope during the compilation phase.
- **promise** - An object representing the eventual completion or failure of an asynchronous operation.
- **prototype** - An object that is associated with every function and object by default in JavaScript.
- **strict** **mode** - A way to opt into a restricted variant of JavaScript.
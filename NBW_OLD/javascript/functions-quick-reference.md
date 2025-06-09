# Functions Quick Reference

- [Rest Parameters and Spread Syntax](#rest-parameters-and-spread-syntax)
  - [Rest Parameters](#rest-parameters)
  - [Spread Syntax](#spread-syntax)
- [Closures](#closures)
- [Higher-Order Functions](#higher-order-functions)
- [Recursion](#recursion)
  - [Things to remember](#things-to-remember)
- [Glossary](#glossary)

<hr>

## Rest Parameters and Spread Syntax

### Rest Parameters

Rest parameters allow you to represent an indefinite number of arguments as an array.

```js
const numbers = [1, 2, 3, 4, 5];
function sum(...numbers) {
  return numbers.reduce((total, num) => total + num, 0);
}
// Output: 15
```
<hr>

### Spread Syntax

Spread syntax allows an iterable to be expanded in places where zero or more arguments or elements are expected.

```js
const numbers = [1, 2, 3];
console.log(Math.max(...numbers)); // 3
```
<hr>

## Closures

A closure is a function that has access to its own scope, the outer function's scope,
and the global scope. It can access variables from its own scope, the outer function's
scope, and the global scope.

```js
function outerFunction(outerVariable) {
    return function innerFunction(innerVariable) {
        console.log('outerVariable:', outerVariable);
        console.log('innerVariable:', innerVariable);
    }
}

const newFunction = outerFunction('outside');
newFunction('inside'); // Logs: outerVariable: outside, innerVariable: inside
```
<hr>

## Higher-Order Functions

In JavaScript, functions are first-class objects. This means that, like other objects, a
function can be passed as an argument to other functions, can be returned by another
function and can be assigned as a value to a variable. Such functions are called
higher-order functions.

```js
// Define a higher-order function that takes a number and a callback function
function applyOperation(num, callback) {
    return callback(num);
}

// Define a callback function
function double(number) {
        return number * 2;
}

// Call the higher-order function, passing // in a number and the callback function
console.log(applyOperation(5, double));  
```

<question>What's happening here?</question>

- **`applyOperation`** is a higher-order function because it accepts a number (`num`)
  and another function (`callback`) as arguments. The `callback` function is intended to
  perform some operation on the `num`.
- **`double`** is a callback function defined separately. It takes a `number` as input
  and returns the doubled value of that number (`number * 2`).

- **`applyOperation(5, double)`**: Here, we are calling the `applyOperation` function
  with `5` as the first argument (the `num`) and `double` as the second argument (the
  `callback` function). 
  - Inside `applyOperation`, the `callback(num)` is executed, where `callback` is replaced
    with `double` and `num` is `5`.
  - Therefore, `double(5)` is invoked, resulting in `5 * 2`, which evaluates to `10`.
<hr>

## Recursion

Recursion is a technique in programming where a function calls itself in order to solve
a problem. It is used to solve problems that can be broken down into smaller, repetitive
problems.

```js
function factorial(n) {
    if (n === 0) {
        return 1;
    }
    return n * factorial(n - 1);
}

console.log(factorial(5)); // Output: 120
```

<question>What's happening here?</question>

- **`factorial`** is a recursive function that calculates the factorial of a number `n`.
- The base case is when `n` is `0`, in which case the function returns `1`.
- Otherwise, it returns `n * factorial(n - 1)`, which means it calls itself with `n - 1`
  until it reaches the base case.
- When `factorial(5)` is called, it calculates `5 * 4 * 3 * 2 * 1`, which evaluates to `120`.

### Things to remember

- **Recursion** is a technique where a function calls itself to solve a problem.
- It's important to have a **base case** that stops the recursion.
- Recursion can lead to **stack overflow** errors if not handled properly.
- Recursion is useful for problems that can be broken down into smaller, repetitive problems.
- Recursion can be an elegant solution for certain problems but may not always be the most efficient.
- Tail recursion is a special form of recursion where the recursive call is the last thing the function does. It can be optimized by some compilers to avoid stack overflow errors.
- Recursion can be used to solve problems like factorials, Fibonacci sequence, and more.

## Glossary

- **async**/**await** - A modern way of handling asynchronous operations in JavaScript.
- **callback** - A function passed as an argument to another function to be executed later.
- **closure** - A function that has access to its own scope, the outer function's scope, and the global scope.
- **this** - A keyword that refers to the object it belongs to.

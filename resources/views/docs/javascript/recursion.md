# Recursion
<!-- TOC -->

- [What is Recursion?](#what-is-recursion)
- [Understanding Recursion](#understanding-recursion)
    - [Base Case](#base-case)
    - [Recursive Case](#recursive-case)
- [Why Use Recursion?](#why-use-recursion)
    - [Pros](#pros)
    - [Cons](#cons)
- [Conclusion](#conclusion)

<!-- /TOC -->


<a id="markdown-what-is-recursion" name="what-is-recursion"></a>

## What is Recursion?

Recursion in simple terms, is a function that calls itself, until it doesn't.

It is a programming technique where a function calls itself to solve a problem.
It iterates through a problem by calling itself with a modified version of the input
until it reaches an exit condition that stops the recursion. This is similar to a loop,
but instead of using a loop to iterate through a problem, recursion uses a function to
call itself.

Here is an example of a recursive function that calculates the factorial of a number:

```js
function factorial(n) {
  if (n === 0) return 1
  return n * factorial(n - 1)
}
```

This function calculates the factorial of `n`. We start at `n` and call the `factorial`
function with `n - 1` until `n` is equal to 0. We then multiply `n` by the result of the
`factorial` function.


<a id="markdown-understanding-recursion" name="understanding-recursion"></a>

## Understanding Recursion

Recursion solves problems by breaking them into smaller, manageable sub-problems. It
does this by calling itself with a modified input until it reaches a stopping condition,
similar to a loop. However, instead of iterating through a problem, recursion calls
itself.

Consider the problem of summing all numbers up to `n`. Here's how you might solve it
with a loop:

```js
function sumRange(n) {
  let total = 0;
  for (let i = n; i > 0; i--) {
    total += i;
  }
  return total;
}
```
This function starts at `n` and decrements `i` by 1 until `i` is 0, adding `i` to `total` variable each time.

The same problem can be solved using recursion:

```js
function sumRangeRecursive(n) {
  if (n <= 0) return 0;
  return sumRangeRecursive(n - 1) + n;
}
```

This function starts at `n` and calls itself with `n - 1` until `n` is 0, adding `n` to the
result each time.

<a id="markdown-base-case" name="base-case"></a>

### Base Case

The base case is the condition that stops the recursion. It is the simplest form of the
problem that can be solved directly without further recursion.

For example, in the `sumRangeRecursive` function, the base case is when `n` is less than
or equal to 0. When `n` is 0, the function returns 0, which stops the recursion.

<a id="markdown-recursive-case" name="recursive-case"></a>

### Recursive Case

The recursive case is the condition that calls the function with a modified version of
the input. It is the part of the function that calls itself to solve a sub-problem.

For example, in the `sumRangeRecursive` function, the recursive case is when `n` is
greater than 0. When `n` is greater than 0, the function calls itself with `n - 1` and
adds `n` to the result.

<a id="markdown-why-use-recursion" name="why-use-recursion"></a>

## Why Use Recursion?

Recursion is a powerful programming technique that can be used to solve complex problems
in a simple and elegant way. It is particularly useful for problems that can be broken
down into smaller, more manageable sub-problems.

<a id="markdown-pros" name="pros"></a>

### Pros

- Recursion can be used to solve problems that are difficult or impossible to solve with
  a loop.
- Recursion can be used to solve problems that have a natural recursive structure, such
  as tree or graph traversal.
- Recursion can be used to solve problems that have a simple base case and a recursive
  case.

<a id="markdown-cons" name="cons"></a>

### Cons

- Recursion can be less efficient than iteration because it uses more memory and can
  result in stack overflow errors.
- Recursion can be more difficult to understand and debug than iteration because it
- involves multiple function calls and can be harder to trace.
- Recursion can be more difficult to optimize than iteration because it involves multiple
  function calls and can be harder to optimize.

This function calculates the factorial of `n`. We start at `n` and call the `factorial`
function with `n - 1` until `n` is equal to 0. We then multiply `n` by the result of the
`factorial` function.

<a id="markdown-conclusion" name="conclusion"></a>

## Conclusion

Recursion is a powerful programming technique that can be used to solve complex problems
in a simple and elegant way. It is particularly useful for problems that can be broken
down into smaller, more manageable sub-problems. However, recursion can be less
efficient than iteration and can be more difficult to understand and debug. It is
important to understand the trade-offs of recursion and to use it judiciously.


<!-- ## More Examples

Here are some more examples of how recursion can be used to solve problems:

<a id="markdown-factorial---" name="factorial---"></a>

### Factorial -->


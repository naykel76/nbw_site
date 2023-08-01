# Javascript Cheatsheet
<!-- TOC -->

- [Events](#events)
- [Get Element](#get-element)
- [ES Modules](#es-modules)
- [Spread vs Rest](#spread-vs-rest)
    - [Spread Operator](#spread-operator)
- [Destructuring Arrays](#destructuring-arrays)

<!-- /TOC -->

<a id="markdown-events" name="events"></a>

## Events

```js
element.addEventListener('event', eventHandler);
```

- `element`: is the HTML element to which you want to attach the click event listener.
- `event`: is the name of the event to listen for. (`'click'`, `'submit'`, `'keydown'`, etc)
- `eventHandler`: is the function that will be executed when the click event occurs.

<a id="markdown-get-element" name="get-element"></a>

## Get Element
```js
const elementById = document.getElementById('elementId');
const elementsByTagName = document.getElementsByTagName('tagname');
const elementsByClassName = document.getElementsByClassName('classname');
const firstMatchingElement = document.querySelector('css-selector');
const allMatchingElements = document.querySelectorAll('css-selector');
```

Make sure you add the dot before the class when using the query selector

```js
const firstMatchingElement = document.querySelector('.css-class');
```

<a id="markdown-es-modules" name="es-modules"></a>

## ES Modules

```js
// utilities.js
export function square(number) {
  return number * number;
}
// arrow function
export const square = (number) => number * number;
```

```js
// Importing functions from the utils module
import { square } from './utils.js';

// Using the imported functions
const number = 5;
console.log(`The square of ${number} is ${square(number)}`);
```


<a id="markdown-spread-vs-rest" name="spread-vs-rest"></a>

## Spread vs Rest

```js
function print(myArray) {
  array.forEach(item => console.log(item));
}

print(['arg1', 'arg2']);
// arg1
// arg2
```

<a id="markdown-spread-operator" name="spread-operator"></a>

### Spread Operator

The spread operator unpacks iterables into individual elements. This comes in handy when a
function expects a list of arguments and all you have is an array:

```js
const array = [1, 2, 3];
console.log(...array);
// 1 2 3
```

<a id="markdown-destructuring-arrays" name="destructuring-arrays"></a>

## Destructuring Arrays

```js
// the old way
var fruit = ['apple', 'banana', 'kiwi'];

var apple = fruit[0];
var banana = fruit[1];
var kiwi = fruit[2];

// es6
const [apple, banana, kiwi] = fruit;

const [apple, ...rest] = ['apple', 'banana', 'kiwi'];
console.log(rest); // -> ["banana", "kiwi"]
```

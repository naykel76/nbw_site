# Javascript Cheatsheet
<!-- TOC -->

- [Events](#events)
- [Get Element](#get-element)
- [ES Modules](#es-modules)

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

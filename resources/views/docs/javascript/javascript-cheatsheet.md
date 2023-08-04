# Javascript Cheatsheet
<!-- TOC -->

- [Events](#events)
- [Get DOM Element](#get-dom-element)
- [ES Modules](#es-modules)
- [Spread vs Rest](#spread-vs-rest)
    - [Spread Operator](#spread-operator)
- [Destructuring Arrays](#destructuring-arrays)
- [Questions](#questions)
        - [How can I run a function when the screen first loads?](#how-can-i-run-a-function-when-the-screen-first-loads)
        - [What selectors can I use to select the next instance of an element or class?](#what-selectors-can-i-use-to-select-the-next-instance-of-an-element-or-class)

<!-- /TOC -->

<a id="markdown-events" name="events"></a>

## Events

```js
element.addEventListener('event', callback);
element.addEventListener('event', functionName);
```

- `element`: is the HTML element to which you want to attach the click event listener.
- `event`: is the name of the event to listen for. (`'click'`, `'submit'`, `'keydown'`, etc)
- `eventHandler`: is the function that will be executed when the click event occurs.

<a id="markdown-get-dom-element" name="get-dom-element"></a>

## Get DOM Element
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


<a id="markdown-questions" name="questions"></a>

## Questions

<a id="markdown-how-can-i-run-a-function-when-the-screen-first-loads" name="how-can-i-run-a-function-when-the-screen-first-loads"></a>

#### How can I run a function when the screen first loads?

To run a function when the screen first loads, you can use the `window.onload` event or the modern
`DOMContentLoaded` event. These events ensure that your JavaScript code is executed after the HTML
content has been fully loaded and is ready to be manipulated.

```js
// `window.onload` event
window.onload = () => {
    myFunc();
};

// `DOMContentLoaded` event
document.addEventListener('DOMContentLoaded', () => {
    myFunc();
});
```

<a id="markdown-what-selectors-can-i-use-to-select-the-next-instance-of-an-element-or-class" name="what-selectors-can-i-use-to-select-the-next-instance-of-an-element-or-class"></a>

#### What selectors can I use to select the next instance of an element or class?

```html
<script> // select next canvas </script>
<canvas></canvas>

<script> // select next canvas </script>
<canvas></canvas>

```

<!--

<script>
    const scripts = document.querySelectorAll('script');
    scripts.forEach(script => {
        const nextCanvas = script.nextElementSibling;
        if (nextCanvas && nextCanvas.tagName.toLowerCase() === 'canvas') {
            // Do something with the next canvas element
            // For example, you can add a class to it
            nextCanvas.classList.add('selected');
        }
    });
</script>
<canvas></canvas>
<script>
    const scripts = document.querySelectorAll('script');
    scripts.forEach(script => {
        const nextCanvas = script.nextElementSibling;
        if (nextCanvas && nextCanvas.tagName.toLowerCase() === 'canvas') {
            // Do something with the next canvas element
            // For example, you can add a class to it
            nextCanvas.classList.add('selected');
        }
    });
</script>
<canvas></canvas>
<script>
    const scripts = document.querySelectorAll('script');
    scripts.forEach(script => {
        const nextCanvas = script.nextElementSibling;
        if (nextCanvas && nextCanvas.tagName.toLowerCase() === 'canvas') {
            // Do something with the next canvas element
            // For example, you can add a class to it
            nextCanvas.classList.add('selected');
        }
    });
</script>
<canvas></canvas>
<script>
    const scripts = document.querySelectorAll('script');
    scripts.forEach(script => {
        const nextCanvas = script.nextElementSibling;
        if (nextCanvas && nextCanvas.tagName.toLowerCase() === 'canvas') {
            // Do something with the next canvas element
            // For example, you can add a class to it
            nextCanvas.classList.add('selected');
        }
    });
</script>
<canvas></canvas> -->

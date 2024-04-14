# Javascript Cheatsheet
- [Events](#events)
- [Get DOM Element](#get-dom-element)
- [Setting Values](#setting-values)
  - [Div or Element with Inner HTML](#div-or-element-with-inner-html)
  - [Plain Text](#plain-text)
  - [Form Controls](#form-controls)
  - [Checkbox or Radio Input](#checkbox-or-radio-input)
  - [Image Source](#image-source)
- [ES Modules](#es-modules)
- [Spread vs Rest Operators](#spread-vs-rest-operators)
  - [Spread Operator](#spread-operator)
  - [Rest Operator](#rest-operator)
- [Destructuring Objects and Arrays](#destructuring-objects-and-arrays)
- [Numeric Conversions](#numeric-conversions)



## Events

```js
element.addEventListener('event', callback);
element.addEventListener('event', functionName);
```

- `element`: is the HTML element to which you want to attach the click event listener.
- `event`: is the name of the event to listen for. (`'click'`, `'submit'`, `'keydown'`, etc)
- `eventHandler`: is the function that will be executed when the click event occurs.


```js
document.addEventListener('keydown', event => { });
```

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

## Setting Values

### Div or Element with Inner HTML

```js
myElement.innerHTML = '<p>This is a new paragraph.</p>';
```

### Plain Text

If you're working with plain text and want to ensure that the content is treated as text and not
HTML, you can use the `textContent`:

```js
myElement.textContent = 'This is just text content.';
```

### Form Controls

```javascript
inputElement.value = 'New Value';
textareaElement.value = 'New Text';
selectElement.value = 'option2';
```

### Checkbox or Radio Input

```javascript
checkboxElement.checked = true; // or false
```

### Image Source

```javascript
imageElement.src = 'new-image.jpg';
```

<!------- SETTING VALUES END ------->


## ES Modules

```js
export const square = (number) => number * number;
```

```js
import { square } from './utils.js';

const number = 5;
console.log(`The square of ${number} is ${square(number)}`);
```

## Spread vs Rest Operators

JavaScript uses three dots (...) for both the rest and spread operators. But these two
operators are not the same.


The main difference between rest and spread is that the rest operator puts the rest of
some specific values into a array. But the spread syntax expands iterables into
individual elements.

### Spread Operator

The spread operator (...) allows an iterable such as an `array` or `string` to be
expanded in places where zero or more arguments (for function calls) or elements (for
array literals) are expected.

```js
const array = [1, 2, 3];
console.log(...array); // 1 2 3
const string = 'hello';
console.log(...string); // h e l l o
```

The spread operator can also be used to spread the properties of an object into
another object.

```js
const object1 = { a: 1, b: 2 };
const object2 = { ...object1, c: 3 };
console.log(object2); // { a: 1, b: 2, c: 3 }
```

### Rest Operator

The rest operator is used to collect the remaining elements into an array. For example,
you can use the rest operator to collect the remaining arguments into an array.

```js
function sum(...args) {
  return args.reduce((a, b) => a + b, 0);
}
console.log(sum(1, 2, 3, 4)); // 10
```

The rest operator can also be used to collect the remaining properties into an object or
array.

```js
const { a, ...rest } = { a: 1, b: 2, c: 3 };
console.log(rest); // { b: 2, c: 3 }
```

```js
const array = [1, 2, 3];
const [first, ...rest] = array;
console.log(rest); // [2, 3]
```

## Destructuring Objects and Arrays

```js
const fruits = ['apple', 'banana', 'kiwi'];
const [fruit, fruit2, fruit3] = fruits;
const [fruit1, ...rest] = fruits;
console.log(rest); // -> ["banana", "kiwi"]
```

```js
const { name, city } = { name: 'Bill', city: 'Brisbane' };
console.log(name, city);
```


## Numeric Conversions

```js
let numberToBinary = (num) => num.toString(2);
console.log(numberToBinary(10)); // Output: "1010"
```

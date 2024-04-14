# Javascript Cleaner Code Examples
<!-- TOC -->

- [Conditional assignment](#conditional-assignment)
    - [If statement](#if-statement)
    - [Logical OR operator](#logical-or-operator)
- [Ternary Examples](#ternary-examples)
- [Optional Chaining](#optional-chaining)
- [Combining Multiple Event Listeners for Optimisation](#combining-multiple-event-listeners-for-optimisation)

<!-- /TOC -->

<a id="markdown-conditional-assignment" name="conditional-assignment"></a>

## Conditional assignment

<a id="markdown-if-statement" name="if-statement"></a>

### If statement

```js
// If 'truthy' is falsy, assign the value of 'falsy' to it
if (!truthy) {
    truthy = falsy;
}
```

<a id="markdown-logical-or-operator" name="logical-or-operator"></a>

### Logical OR operator

```js
truthy = truthy || falsy;
```

<a id="markdown-ternary-examples" name="ternary-examples"></a>

## Ternary Examples

```js
element ? (element.value = value) : console.error(`Element with ID "${id}" not found.`);
```

Instead of

```js
if (element) {
    element.value = value;
} else {
    console.error(`Element with ID "${id}" not found.`);
}
```

<a id="markdown-optional-chaining" name="optional-chaining"></a>

## Optional Chaining

    ctx?.canvas?.width = config.width;


<a id="markdown-combining-multiple-event-listeners-for-optimisation" name="combining-multiple-event-listeners-for-optimisation"></a>

## Combining Multiple Event Listeners for Optimisation

```js
document.getElementById('clear-1')?.addEventListener('click', () => updateGameStats(1));
document.getElementById('clear-2')?.addEventListener('click', () => updateGameStats(2));
document.getElementById('clear-3')?.addEventListener('click', () => updateGameStats(3));
document.getElementById('clear-4')?.addEventListener('click', () => updateGameStats(4));

function updateGameStats(linesCleared: number) {
    // do stuff
}
```

```js
const clearButtons = [1, 2, 3, 4];

clearButtons.forEach(linesCleared => {
    const button = document.getElementById(`clear-${linesCleared}`);
    if (button) button.addEventListener('click', () => updateGameStats(linesCleared));
});
```


the value, must be the same as the element id
```js
const values = [1, 2, 3, 4];

values.forEach((linesCleared) => {
    const button = document.getElementById(`clear-${linesCleared}`);
    if (button) {
        button.addEventListener('click', () => incrementScore(linesCleared));
    }
});
```

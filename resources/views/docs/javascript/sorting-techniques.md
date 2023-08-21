# Sorting Techniques

<!-- TOC -->

- [`array.sort((a, b) => { ... })`](#arraysorta-b----)

<!-- /TOC -->

<a id="markdown-arraysorta-b----" name="arraysorta-b----"></a>

## `array.sort((a, b) => { ... })`

The `sort` method calls the comparison function multiple times to sort the elements. Each time the
comparison function is called, it receives two elements (`a` and `b`) as arguments. The comparison
function returns a negative, positive, or zero value to indicate the relative order of the two
elements.

```js
scores.sort((a, b) => {
    if (a.score > b.score) {
        return -1;
    } else if (a.score < b.score) {
        return 1;
    } else {
        return 0;
    }
});
```

```js
scores.sort((a, b) => b.score - a.score);
```


```js
let scores = [
    { playerName: 'Luna', score: 48000 },
    { playerName: 'Finn', score: 43000 },
    { playerName: 'Zoe', score: 46000 },
    { playerName: 'Aiden', score: 50000 },
    { playerName: 'Eli', score: 47000 },
];
```


# Objects
<!-- TOC -->

- [Check existence](#check-existence)
    - [Find item by key](#find-item-by-key)
- [Find item by value](#find-item-by-value)
- [Retrieving values](#retrieving-values)

<!-- /TOC -->


An object literal is literally an object!

```js
const person = {
    firstName: "Mike",
    lastName: "Dingle",
    age: 30
};
```

<!-- ### Object literal lookups -->



<a id="markdown-check-existence" name="check-existence"></a>

## Check existence


<a id="markdown-find-item-by-key" name="find-item-by-key"></a>

### Find item by key

```js
const data = {
  item1: { id: 1, name: 'Sample Item 1' },
  item2: { id: 2, name: 'Sample Item 2' },
  item3: { id: 3, name: 'Sample Item 3' },
};

const key = 'item2';
const item = data.hasOwnProperty(key) ? data[key] : null;
```

<a id="markdown-find-item-by-value" name="find-item-by-value"></a>

## Find item by value

```js
const data = {
  item1: { id: 1, name: 'Sample Item 1' },
  item2: { id: 2, name: 'Sample Item 2' },
  item3: { id: 3, name: 'Sample Item 3' },
};

const value = 'Sample Item 2';
const item = Object.values(data).find(item => item.name === value);
```

<a id="markdown-retrieving-values" name="retrieving-values"></a>

## Retrieving values


# Javascript Cleaner Code Examples
<!-- TOC -->

- [Conditional assignment](#conditional-assignment)
    - [If statement](#if-statement)
    - [Logical OR operator](#logical-or-operator)
    - [More Examples](#more-examples)
- [Optional Chaining](#optional-chaining)

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

<a id="markdown-more-examples" name="more-examples"></a>

### More Examples

```js
if (!lastTimestamp) {
    lastTimestamp = timestamp;
}

or

lastTimestamp = lastTimestamp || timestamp;
```

```js

```


<a id="markdown-optional-chaining" name="optional-chaining"></a>

## Optional Chaining

    ctx?.canvas?.width = config.width;

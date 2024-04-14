# Javascript Logical Operators
<a id="markdown-javascript-logical-operators" name="javascript-logical-operators"></a>

<!-- TOC -->

- [Nullish coalescing](#nullish-coalescing)

<!-- /TOC -->



## Nullish coalescing
<a id="markdown-nullish-coalescing" name="nullish-coalescing"></a>

The nullish coalescing (??) operator is a logical operator that returns its right-hand side
operand when its left-hand side operand is null or undefined, and otherwise returns its left-hand
side operand.

```js
const string = null ?? 'default string';    // expected 'default string'
const value = 0 ?? 58;                      // expected 0
```


```js
// concise
await this.storageService.get('name') || this.storageService.set('name', 'Paul');
// verbose
await this.storageService.get('name') === null
    ? this.storageService.set('name', 'Paul')
    : null;
```

```js
await this.storageService.get('showNotifications') ?? this.storageService.set('showNotifications', true);
// verbose
await this.storageService.get('showNotifications') === null
    ? this.storageService.set('showNotifications', true)
    : null;
```

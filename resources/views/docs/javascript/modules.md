# Javascript ES6 Modules
<!-- TOC -->

- [Exporting Modules](#exporting-modules)
    - [Export vs Export Default](#export-vs-export-default)
    - [Inline vs Named Export](#inline-vs-named-export)
- [Importing Modules](#importing-modules)
- [Full Example](#full-example)

<!-- /TOC -->
<a id="markdown-exporting-modules" name="exporting-modules"></a>

## Exporting Modules

In ECMAScript (ES) modules, there are two ways to export functionality from a module: `export` and
`export default`. They are used to expose values, functions, or objects from one module so that they
can be imported and used in another module.

<a id="markdown-export-vs-export-default" name="export-vs-export-default"></a>

### Export vs Export Default

The `export` keyword is used to explicitly export named values from a module. It allows you to
export multiple named entities (variables, functions, classes, etc.) from a single module. When
you use export, you need to specify a name for each export.

```js
export let getName = (user) => user.name;
export let getAge = (user) => user.age;
```

The `export default` syntax allows you to export a single default value from a module. There can
only be one default export per module. Unlike named exports, you don't need to specify a name for
the default export. It is commonly used when a module exports a single value, such as a class,
object, or a single function.

```js
export default class User {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }
}
```

<a id="markdown-inline-vs-named-export" name="inline-vs-named-export"></a>

### Inline vs Named Export

The alternative to exporting inline is to use the `export` statement at the end of the module to
export the desired values, functions, or objects. This method is often referred to as "named
export."

**Inline export**

```js
export let getName = (user) => user.name;
export let getAge = (user) => user.age;
```

**Named export**

```js
let getName = (user) => user.name;
let getAge = let getAge = (user) => user.age;

export { getName, getAge };
```

<a id="markdown-importing-modules" name="importing-modules"></a>

## Importing Modules

To import "non-default" modules you can wrap them in curly brackets.

```js
import User, {getName, getAge } from './path/to/module';
```

Note, when using ECMAScript (ES) modules in your JavaScript code, you need to specify the
`type="module"` attribute in the script tag to indicate that the script is an ES module.

By defining `type="module"` it also defaults the file to use `defer` attribute for loading.


<a id="markdown-full-example" name="full-example"></a>

## Full Example

```html
<!-- index.html -->
<script type="module" src="/main.js"></script>
```

```js
// user.js
export default class User {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }
}

export let getName = (user) => user.name;
export let getAge = (user) => user.age;
```

```js
// main.js
import User, { getName, getAge } from './src/js/user';

const user = new User('James', 84)

console.log(user);
console.log(`User's name is ${getName(user)}`)
console.log(`User's age is ${getAge(user)}`)
```

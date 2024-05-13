# Javascript Modules

- [Overview](#overview)
- [CommonJS Modules](#commonjs-modules)
  - [Exporting a Module](#exporting-a-module)
  - [Importing a Module](#importing-a-module)
- [ECMAScript modules](#ecmascript-modules)
  - [Named exports and imports](#named-exports-and-imports)
  - [Default exports and imports](#default-exports-and-imports)


## Overview

JavaScript modules are a way to split JavaScript code into separate files, each
of which can `export` or `import` variables, functions, classes, or values from
or to other modules. This allows for better organization, reusability, and
separation of concerns in your code.

There are two types of modules in JavaScript: `CommonJS` and `ECMAScript modules`.

## CommonJS Modules

CommonJS is a module system used primarily in Node.js environments. It allows
you to define modules using `module.exports` to export values, functions, or
objects from a file.

### Exporting a Module

To export a module in CommonJS, use `module.exports` to export values, functions, or objects.

```js
module.exports = {
    getName: (user) => user.name,
    getAge: (user) => user.age
};
```

### Importing a Module

To import a CommonJS module, use `require` to import and access exported values, functions, or objects. There are two ways to import a module in CommonJS. 


1. You can import the entire module into a single variable:
```js
const user = require('./user.js');
```

In this case, you would access the exported functions like this:
`user.getName()` and `user.getAge()`.

2. You can use destructuring to import specific functions:
```js
const { getName, getAge } = require('./user.js');
```

With this method, you can call the functions directly: `getName()` and `getAge()`.

```html +parse
<x-alert type="info">
<b>Note:</b> The two methods of importing in CommonJS (importing the entire
module vs. destructuring to import specific parts) can be loosely compared to
the two methods of exporting in ES modules (<code>export</code> vs. <code>export
default</code>). 
</x-alert>
```

## ECMAScript modules

ES modules are the standard for modern JavaScript and are supported in browsers
as well as recent versions of Node.js. They use `export` and `import` statements to
manage how module content is exposed and imported.

### Named exports and imports

Named exports allow you to selectively export multiple values, functions, or
classes from a module. Each exported item is identified by its name.

```js
export let getName = (user) => user.name;
export let getAge = (user) => user.age;
```

To import named exports, use the `import` statement followed by the names of the
exported items enclosed in curly braces `{}`.

```js
import { getName, getAge } from './user.js';
```

### Default exports and imports

A module can have a single default export, typically representing the main
functionality or value of the module.

```js
export default class User {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }
}
```

To import a default export, use the `import` statement followed by the name of
the exported item, which can be any name you choose.

```js
import User from './path/to/user';
```

```html +parse
<x-alert type="info">
The environment in which you are working will determine whether you need to specify
the file extension (<code>.js</code>) when importing a module. In Node.js, you can omit the
extension, while in the browser, you may need to include it.
</x-alert>
```

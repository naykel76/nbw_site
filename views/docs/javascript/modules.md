# Javascript ES6 Modules
<!-- TOC -->

- [Overview](#overview)
- [Exporting Modules](#exporting-modules)
    - [Named Exports](#named-exports)
    - [Default Exports](#default-exports)
- [Importing Modules](#importing-modules)
- [Export vs Export Default](#export-vs-export-default)
    - [Inline vs Named Export](#inline-vs-named-export)

<!-- /TOC -->

<a id="markdown-overview" name="overview"></a>

## Overview

JavaScript modules are a way to split JavaScript code into separate files, each of which
can export or import variables, functions, classes, or values from or to other modules.
This allows for better organization, reusability, and separation of concerns in your
code.

<div class="bx info-light bdr-3 rounded-1 flex va-c">
    <svg class="icon wh-4 fs0 mr-2"> <use xlink:href="/svg/naykel-ui.svg#information-circle"></use> </svg>
    <div> Note, when using ECMAScript modules in your JavaScript code, you need to specify the <code>type="module"</code> attribute in the script tag to indicate that the script is an ES module. By defining <code>type="module"</code> it also defaults the file to use <code>defer</code> attribute for loading. </div>
</div>

<a id="markdown-exporting-modules" name="exporting-modules"></a>

## Exporting Modules

There are two types of exports: `named exports` and `default exports`.

<a id="markdown-named-exports" name="named-exports"></a>

### Named Exports

Named exports are used to export several values from a module. They are useful to export
several values from a module. The values are exported by their name.

```js
export let getName = (user) => user.name;
```

<a id="markdown-default-exports" name="default-exports"></a>

### Default Exports

Default exports are used to export a single value from a module. There can only be one
default export per module. The value is exported by default.

```js
export default class User {
    constructor(name) {
        this.name = name;
    }
}
```

<a id="markdown-importing-modules" name="importing-modules"></a>

## Importing Modules

To import named exports, you can use the `import` keyword followed by the module name
and the name of the export in curly braces. You can import multiple named exports by
separating them with commas.

```js
import {getName, getAge } from './path/to/module';
```

You can also import the default export from a module.

```js
import User from './user.js';
```

You can also import all the named exports from a module.

```js
import * as user from './user.js';
```
<a id="markdown-export-vs-export-default" name="export-vs-export-default"></a>

## Export vs Export Default

The `export` keyword is used to explicitly export named values from a module. It allows
you to export multiple named entities (variables, functions, classes, etc.) from a
single module. When you use export, you need to specify a name for each export.

```js
export let getName = (user) => user.name;
export let getAge = (user) => user.age;
```

The `export default` syntax allows you to export a single default value from a module.
There can only be one default export per module. Unlike named exports, you don't need to
specify a name for the default export. It is commonly used when a module exports a
single value, such as a class, object, or a single function.

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

The alternative to exporting inline is to use the `export` statement at the end of the
module to export the desired values, functions, or objects. This method is often
referred to as "named export."

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

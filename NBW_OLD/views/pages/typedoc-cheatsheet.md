# TypeDoc Quick Reference
<!-- TOC -->

- [Install](#install)
- [Configuration](#configuration)

<!-- /TOC -->

<a href="https://typedoc.org/" target="blank">Official Documentation</a>

<a id="markdown-install" name="install"></a>

## Install

```bash
npm install typedoc --save-dev
```
<!-- npx typedoc src/index.ts -->

<a id="markdown-configuration" name="configuration"></a>

## Configuration

Instead of passing all arguments via the command line, the CLI also supports reading TypeDoc
configuration from json files.

You can either create a `typedoc.json` or use an existing `tsconfig.json`

```json
{
    "entryPoints": ["src/index.ts"],
    "out": "docs"
}
```

Existing  `tsconfig.json` file

```json
{
    "compilerOptions": {
        // type script options
    },
    "typedocOptions": {
        "entryPoints": ["src/main.ts"],
        "out": "docs"
    }
}
```



| TSDoc Tag               | Description                                                         |
| ----------------------- | ------------------------------------------------------------------- |
| `@packageDocumentation` | Indicates the start of a package-level comment block.               |
| `@remarks`              | Provides additional remarks or information about the code.          |
| `@deprecated`           | Marks a symbol as deprecated, with an optional deprecation message. |
| `@example`              | Provides code examples to demonstrate usage.                        |
| `@link`                 | Creates a hyperlink to related documentation.                       |
| `@see`                  | References related symbols or external resources.                   |
| `@inheritdoc`           | Inherits documentation from another symbol.                         |
| `@param`                | Documents a function parameter.                                     |
| `@returns`              | Documents the return value of a function.                           |
| `@typeParam`            | Documents a type parameter of a generic function or class.          |
| `@typeparam`            | Synonym for `@typeParam`.                                           |
| `@public`               | Marks a declaration as part of the public API.                      |
| `@internal`             | Marks a declaration for internal use only.                          |
| `@defaultValue`         | Documents the default value of a parameter or property.             |
| `@inheritDoc`           | Inherits documentation from the overridden method or property.      |
| `@linkcode`             | Creates a hyperlink to the source code of a symbol.                 |
| `@exampleLabel`         | Specifies a label for an example, used by `@example` tag.           |
| `@experimental`         | Marks a feature or API as experimental.                             |
| `@preapproved`          | Marks an API element as preapproved.                                |
| `@override`             | Indicates that a method overrides a base class method.              |
| `@throws`               | Documents the exceptions thrown by a function.                      |
| `@inheritdocInline`     | Inherits and embeds documentation from another symbol.              |
| `@linkPlain`            | Creates a plain text hyperlink without tooltip.                     |
| `@internalRemarks`      | Provides internal remarks or notes about the code.                  |
| `@package`              | Documents a private API within a package.                           |


```js
/**
 * @param {number} paramName - Description of a number parameter.
 * @param {string} paramName - Description of a string parameter.
 * @param {boolean} paramName - Description of a boolean parameter.
 * @param {object} paramName - Description of an object parameter.
 * @param {array} paramName - Description of an array parameter.
 * @param {CustomType} paramName - Description of a parameter with a custom type.
 * @param {Function} paramName - Description of a parameter with a function type.
 * @param {...rest} paramName - Description of a parameter using rest syntax.
 *
 * @returns {number} Description of a function returning a number.
 * @returns {string} Description of a function returning a string.
 * @returns {boolean} Description of a function returning a boolean.
 * @returns {object} Description of a function returning an object.
 * @returns {array} Description of a function returning an array.
 * @returns {CustomType} Description of a function returning a custom type.
 * @returns {Function} Description of a function returning a function type.
 * @returns {void} Description of a function with no return value.
 */
```

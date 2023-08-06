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



<code-first-col></code-first-col>
| Command                           | Description                                                |
| --------------------------------- | ---------------------------------------------------------- |
|                                   |                                                            |
|                                   |                                                            |
|                                   |                                                            |
|                                   |                                                            |

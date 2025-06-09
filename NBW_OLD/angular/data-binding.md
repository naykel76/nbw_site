# Data Binding

<!-- TOC -->

- [Nested Properties](#nested-properties)

<!-- /TOC -->



<a id="markdown-nested-properties" name="nested-properties"></a>

## Nested Properties

```js
gameStats: GameStats = { score: 0, lines: 0, level: 1 };
```

```html
<p> Score: {{ gameStats.score }} </p>
<p> Lines: {{ gameStats.lines }} </p>
<p> Level: {{ gameStats.level }} </p>
```

# Helper Functions

<!-- TOC -->

- [Introduction](#introduction)
- [`stripDash()`](#stripdash)
- [`strReplace()`](#strreplace)
- [`escapeDecimal()`](#escapedecimal)
- [`setPrefix()`](#setprefix)

<!-- /TOC -->


<a id="markdown-introduction" name="introduction"></a>

## Introduction

JTB provides a collection of global "helper" functions, which are utilized by the framework
internally. Nevertheless, you have the freedom to use these functions independently within your
own SCSS code.

```scss
@use "./functions/helpers" as *;
```

<a id="markdown-stripdash" name="stripdash"></a>

## `stripDash()`

Remove dash if it is the last character in a string.

You can us this function when creating utility classes to ensure that no rogue dashes are present.

```scss
stripDash($string)
```

**Example**
```scss
$class: stripDash('bdr-');
.#{$class} { }
```

**Outputs**
```css
.bdr { }
```

<a id="markdown-strreplace" name="strreplace"></a>

## `strReplace()`

```scss
strReplace($string, $search, $replace: "")
```

<a id="markdown-escapedecimal" name="escapedecimal"></a>

## `escapeDecimal()`

```scss
escapeDecimal($int)
```

<a id="markdown-setprefix" name="setprefix"></a>

## `setPrefix()`

This function allows users to define custom prefixes within a `utility-property-map` when
generating class names. If a custom prefix is defined in the map, it will be used as a prefix for
the class name. Otherwise, if no prefix is specified or it is empty, the function will default to
using the property name itself as the prefix for the class name.

```scss
setPrefix($map, $property)
```

```scss
$properties: (
    "border": (
        // other attributes
    ),
    "padding": (
        "prefix": "p",
        // other attributes
    ),
);
```

**Example**

```scss
@each $property, $map in $properties {
    $values: map-get($map, "values");
    $prefix: setPrefix($map, $property);
    @debug $prefix;
}
```

**Output**

```bash
Debug: border
Debug: p
```



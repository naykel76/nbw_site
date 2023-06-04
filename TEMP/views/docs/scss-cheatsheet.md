# SASS Cheatsheet

<!-- MarkdownTOC -->

- [Conditionals](#conditionals)
    - [Ternary Example](#ternary-example)
- [Strings](#strings)
    - [Check if last character is a dash and remove](#check-if-last-character-is-a-dash-and-remove)
- [Maps](#maps)
    - [Add or Merge Maps](#add-or-merge-maps)
    - [Map Keys](#map-keys)
    - [Remove items from map](#remove-items-from-map)
- [Lists](#lists)
    - [List Functions](#list-functions)
        - [How can I use a forwarded scss variable in the same file?](#how-can-i-use-a-forwarded-scss-variable-in-the-same-file)

<!-- /MarkdownTOC -->




<a id="conditionals"></a>
## Conditionals

```scss
@if $condition { } @else { }
```
<a id="ternary-example"></a>
### Ternary Example
```scss
$var: if($condition, 'this', 'that');
```
<a id="strings"></a>
## Strings

<a id="check-if-last-character-is-a-dash-and-remove"></a>
### Check if last character is a dash and remove
```scss
$class: "bdr-";

@if str-slice($class, -1) == "-" {
    $class: str-slice($class, 1, -2);
}

@debug $class;
```

<a id="maps"></a>
## Maps

    @use "sass:map";
    map-get($map, $key, $keys...)
    map.deep-merge($map1, $map2) //=> map
    map.deep-remove($map, $key, $keys...) //=> map
    map.merge($map1, $keys..., $map2)
    map.remove($map, $keys...)
    map.set($map, $key, $value)
    map.values($map)

<a id="add-or-merge-maps"></a>
### Add or Merge Maps

    map.merge($map1, $map2, ..., $map{n})


```scss
$map1: ( "primary": ( "base": red, ) );
$map2: ( "secondary": ( "base": blue, ) );
$map3: ( "secondary": ( "base": green, ) );

@debug map.merge($map1, $map2, $map3);
```

    <!-- add maps one by one with map.set -->
    @debug map.set($map, $add-this-map)


<a id="map-keys"></a>
### Map Keys

    map.keys($map)                          <!-- get map key -->
    map.keys(map.merge($map1, $map2));      <!-- merge maps and get keys -->
    map.has-key($map, $key, $keys...)       <!-- check key exists -->


<a id="remove-items-from-map"></a>
### Remove items from map

```scss
// OBJECTIVE - Remove 'sm' from the breakpoints-map
@debug "Updated map:" map.remove($breakpoints, 'sm');
```

<a id="lists"></a>
## Lists

<a id="list-functions"></a>
### List Functions

| Command                            | Example                                                     |
| :--------------------------------- | :---------------------------------------------------------- |
| length($list)                      | Returns the length of a list.                               |
| nth($list, $n)                     | Returns a specific item in a list.                          |
| set-nth($list, $n, $value)         | Replaces the nth item in a list.                            |
| join($list1, $list2, [$separator]) | Joins together two lists into one.                          |
| append($list1, $val, [$separator]) | Appends a single value onto the end of a list.              |
| zip($lists…)                       | Combines several lists into a single multidimensional list. |
| index($list, $value)               | Returns the position of a value within a list.              |
| list-separator(#list)              | Returns the separator of a list.                            |






---

#### How can I use a forwarded scss variable in the same file?

Assume you have a scss file named `colors.scss` that defines some color variables, and a scss
file named `components.scss` that defines some component variables:

```scss
// colors.scss
$primary: #7c0442 !default;
$secondary: #fff4e5 !default;

// components.scss
$nav-bg: #efefef !default;
```

Then, you want to create a file named `overrides.scss` where you can easily override said variables.

```scss
// overrides.scss
@forward "variables" with (
    $primary: #7c0442,
    $secondary: #fff4e5
);
// wrong, undefined error
@forward "components" with (
    $navbar-bg: $primary,
);
```

When compiling your your `main.scss`, will get an 'Undefined variable `$navbar-bg: $primary`'

This is because `$primary` is not available to use in the override file, it is only being
forwarded. To fix this error you need to include the `@use` statement as well.

```scss
// overrides.scss
@forward "variables" with (
    $primary: #7c0442,
    $secondary: #fff4e5
);

@use 'components' as *;

@forward "components" with (
    $navbar-bg: $primary,
);
```

# SASS Quick Reference

- [Conditionals](#conditionals)
    - [Ternary Example](#ternary-example)
- [Strings](#strings)
    - [Check if last character is a dash and remove](#check-if-last-character-is-a-dash-and-remove)
- [Maps](#maps)
    - [Get values](#get-values)
    - [Get nested value](#get-nested-value)
    - [Add or Merge Maps](#add-or-merge-maps)
    - [Map Keys](#map-keys)
    - [Override map value](#override-map-value)
    - [Remove items from map](#remove-items-from-map)
- [Lists](#lists)
    - [List Functions](#list-functions)
        - [How can I use a forwarded scss variable in the same file?](#how-can-i-use-a-forwarded-scss-variable-in-the-same-file)
- [Check Type](#check-type)
- [Check Existence](#check-existence)
    - [Check if key exists](#check-if-key-exists)


## Conditionals

```scss +torchlight-scss
@verbatim
@if $condition { } @else { }
@endverbatim
```

### Ternary Example
```scss +torchlight-scss
$var: if($condition, 'this', 'that');
```

## Strings

### Check if last character is a dash and remove
```scss +torchlight-scss
$class: "bdr-";

@@if str-slice($class, -1) == "-" {
    $class: str-slice($class, 1, -2);
}

@@debug $class;
```


## Maps

    map.deep-merge($map1, $map2) //=> map
    map.deep-remove($map, $key, $keys...) //=> map
    map.merge($map1, $keys..., $map2)
    map.remove($map, $keys...)
    map.set($map, $key, $value)
    map.values($map)

### Get values

    map-get($map, $key, $keys...)

### Get nested value

```scss +torchlight-scss
$color-maps: (
    "blue": ( "100": #dbeafe, "200": #bfdbfe ),
    "red": ( "100": #fee2e2, "200": #fecaca )
);

@@debug map-get($color-maps, 'blue'); // ("100": #dbeafe, "200": #bfdbfe)
@@debug map-get($color-maps, 'blue', '100'); // #dbeafe

```

### Add or Merge Maps

    map.merge($map1, $map2, ..., $map{n})


```scss +torchlight-scss
$map1: ( "primary": ( "base": red, ) );
$map2: ( "secondary": ( "base": blue, ) );
$map3: ( "secondary": ( "base": green, ) );

@@debug map.merge($map1, $map2, $map3);
```

    <!-- add maps one by one with map.set -->
    @@debug map.set($map, $add-this-map)



### Map Keys

    map.keys($map)                          <!-- get map key -->
    map.keys(map.merge($map1, $map2));      <!-- merge maps and get keys -->

### Override map value

```scss +torchlight-scss
map.set($map, $key, $value)
$map: ( "primary": ( "base": red, ) );
```

```scss +torchlight-scss
$color-map: map-merge( $color-map, ( "blue": $primary ) );
```



### Remove items from map

```scss +torchlight-scss
// OBJECTIVE - Remove 'sm' from the breakpoints-map
@@debug "Updated map:" map.remove($breakpoints, 'sm');
```


## Lists


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

| Command     | List | Map  |
| :---------- | :--- | :--- |
| Remove Item |      |      |

Remove Item Map List



---


#### How can I use a forwarded scss variable in the same file?

Assume you have a scss file named `colors.scss` that defines some color variables, and a scss
file named `components.scss` that defines some component variables:

```scss +torchlight-scss
// colors.scss
$primary: #7c0442 !default;
$secondary: #fff4e5 !default;

// components.scss
$nav-bg: #efefef !default;
```

Then, you want to create a file named `overrides.scss` where you can easily override said variables.

```scss +torchlight-scss
// overrides.scss
@@forward "variables" with (
    $primary: #7c0442,
    $secondary: #fff4e5
);
// wrong, undefined error
@@forward "components" with (
    $navbar-bg: $primary,
);
```

When compiling your your `main.scss`, will get an 'Undefined variable `$navbar-bg: $primary`'

This is because `$primary` is not available to use in the override file, it is only being
@forwarded. To fix this error you need to include the `@use` statement as well.

```scss +torchlight-scss
// overrides.scss
@@forward "variables" with (
    $primary: #7c0442,
    $secondary: #fff4e5
);

@@use 'components' as *;

@@forward "components" with (
    $navbar-bg: $primary,
);
```

## Check Type

```scss +torchlight-scss
@@if type-of($value) == map { }
@@if type-of($value) == list { }
@@if type-of($value) == string { }
@@if type-of($value) == number { }
@@if type-of($value) == color { }
@@if type-of($value) == bool { }
@@if type-of($value) == null { }
```

## Check Existence

### Check if key exists

```scss
map.has-key($map, $key, $keys...)
```

**Examples**

```scss
@@if (map-has-key($map, $key)) { }
@@if (not map-has-key($map, $key)) { }
```

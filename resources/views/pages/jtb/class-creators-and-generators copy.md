### Things to know

- invalid characters such as decimals, slashes, and spaces are automatically escaped







<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->



## Class Generators

There are two main mixins used to generate classes: `generate-utilities` and
`generate-classes`.

### `generate-utilities` - (single property class)

The `generate-utilities` mixin can be used to generate utility classes. It accepts a map
of properties where each key in the map represents the CSS property, and the associated
values provide the details needed to generate multiple variants of utility classes for
that property.

**How it works:**

In the map, each `key` corresponds to a CSS property, and its `value` can either be a list
of values or a map of key-value pairs.

- If the `value` is a list, each item in the list represents a value for the CSS property.
- If the `value` is a map of key-value pairs, the key acts as an identifier and the value
  represents the CSS property value.

```scss
$properties-map: (
    background-color: (
        prefix: 'bg-',
        values: ('red', (success: 'green'))
    )
);
```

```scss
@include generate-utilities($properties-map, responsive: false);
```

**Output:**
```scss
.bg-red { background-color: red; }
.bg-success { background-color: green; }
```

### `generate-classes` (multiple property class)

The `generate-classes` mixin is used to generate a class or map of classes based on a one
or many properties. This mixin is particularly useful when you responsive custom classes

```scss
$custom-classes: (
    flex-center-all: (
        props: (
            display: flex,
            flex-direction: column,
            align-items: center,
            justify-content: center,
        ),
        breakpoints: ('sm', 'md', 'lg', 'xl')
    ),
    // other classes...
);

@include generate-classes($custom-classes);
```

### Responsive Variants

Both the `generate-utilities` and `generate-classes` mixins support responsive variants.
To create responsive classes, you can include a `breakpoints` key in the property map or
custom class map.

For example, to generate responsive classes for the `display` property:

```scss
$properties-map: (
    display: (
        values: (block),
        breakpoints: ('sm', 'md')
    )
);
```

```scss
@include generate-utilities($properties-map);
```

**Output:**
```scss
.block { display: block; }

@media (min-width: 576px) {
    .sm\:block { display: block; }
}

@media (min-width: 768px) {
    .md\:block { display: block; }
}
```

### Position and Unit Based Classes

To create position-based classes such as margin-top or padding-left, you can add the
positions key to the property map with a list of positions for which classes will be
generated. 

```scss
$properties-map: (
    margin: (
        prefix: 'm-',
        values: (1),
        unit: "rem",
        positions: (t: (top), xy: (top, bottom)),
    )
);
```

```scss
@include generate-utilities($properties-map);
```

**Output:**
```scss
.m-t-1 { margin-top: 1rem; }
.m-xy-1 { margin-top: 1rem; margin-bottom: 1rem; }
```

## Prefix and Identifier

The `prefix` used to identify the class. This helps create a consistent naming convention
for the generated utility classes. For example, a prefix of `bg-` would generate classes
like `bg-red` and `bg-success`.

The `identifier` is the key used to differentiate and create more descriptive class names.
For instance, using an identifier like success with a value of `green` would result in the
class `bg-success`, providing clearer context and specificity.



## Value Lists

There are two types of lists that can be used in the `properties-map`:

```scss
// value lists
$sizes-map: (0, 0.25, 0.5, 0.75, 0.875, 1) ;
// key-value lists
$key-value-map: (base: 1.5, auto: auto) ;
```

### Merging Lists and Maps

Sometimes you may want to merge multiple lists or maps into a single map. This can be done
using the `magic-merge` function. This is particularly useful when you have mixed types of
lists and maps, and you want to merge them into a single map. 

The `magic-merge` function takes any number of collections (maps or lists) as arguments.
It iterates over each collection and checks its type. If the collection is a list, it
converts the list to a map using the `listToMap` function (which is assumed to convert
each list item into a map key with a corresponding value). Then, it merges the collection
(whether it was originally a map or has been converted to a map from a list) into a
cumulative map. The function finally returns this cumulative map, which is a combination
of all the input collections.

```scss
$sizing-merged: magic-merge($sizes-map, $key-value-map);
```

## Tips and tricks

You can convert a list of values to a map of key-value pairs allowing you to merge
multiple maps together using the `listToMap()` helper function. This can be useful when
you have a list of numeric values as well as a map of variant sizes. For example:

```scss
$text-size-variants: ( xs: 0.75rem, sm: 0.875rem, base: 1rem, lg: 1.125rem, xl: 1.5rem ) !default;
$text-rem-sizes: listToMap((2, 2.5, 3, 4, 9)) !default;

$merged: map-merge($text-size-variants, $text-rem-sizes);
```

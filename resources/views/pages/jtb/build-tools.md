# Build Tools: Class and Utility Generation
- [Work Flow](#work-flow)
- [Introduction](#introduction)
- [Maker and Builder Mixins](#maker-and-builder-mixins)
    - [Makers](#makers)
    - [Builders](#builders)
    - [How They Work Together](#how-they-work-together)
- [Data Structures (review and move)](#data-structures-review-and-move)
    - [Property Map](#property-map)
        - [Values](#values)
- [Mixins](#mixins)
    - [`build-property-classes($properties-map, $responsive: false)`](#build-property-classesproperties-map-responsive-false)
        - [Data Structure:](#data-structure)
        - [Example Usage:](#example-usage)
    - [`build-composite-classes($properties-map, $responsive: false)`](#build-composite-classesproperties-map-responsive-false)
        - [Data Structure:](#data-structure-1)
        - [Example Usage:](#example-usage-1)
    - [Key Differences:](#key-differences)

## Work Flow

1. Create a map of properties with one or more properties and their values.
2. Use the `generate-utilities` mixin to generate utility classes for a single property.
3. (Optional) add breakpoints for responsive variants.

## Introduction

This document outlines the tools and mixins available for generating both utility and
custom CSS classes. Whether you're creating single-use utility classes or more complex,
multi-property classes, these tools provide flexible solutions to streamline your
workflow.

## Maker and Builder Mixins

This system provides two types of mixins: **Makers** and **Builders**.

### Makers

**Makers** are utility mixins designed to create **a single property or class at a time**,
based on specific properties, values, and positions.

They are ideal for generating individual utility classes, responsive variants, or
position-based classes.

### Builders

**Builders** are mixins that generate **multiple classes** automatically, using a map of
properties, values, and options.  

They are best suited for efficiently creating a large set of related utility classes.

### How They Work Together

- **Builders** rely on **Makers** internally to generate individual classes.
- **Makers** can also be used independently when only a single class is required.

## Data Structures (review and move)

### Property Map

A **Property Map** defines how utility classes are generated from CSS properties. Each
entry includes the CSS property name, a list of values, and optional settings such as a
class prefix, breakpoints, or positional variants.





#### Values

Values may be a list of strings or a map of key-value pairs. In maps, the key becomes the
class name, and the value is applied as the CSS property value.


## Mixins


### `build-property-classes($properties-map, $responsive: false)`

This mixin is for generating **individual utility classes** based on a set of single properties. It’s designed to handle cases where you want to create utility classes for each property separately, providing more granular control over individual styles.

#### Data Structure:

* **`$properties-map`**: A map where each key represents a **CSS property** and the value
  is another map that specifies the possible **values** and other properties such as
  `prefix`, `unit`, `positions`, and `breakpoints`.

```html +parse-code
<x-torchlight-code language="scss">
    $properties-map: (
        property-name: (
            prefix: 'prefix-',      // Optional: Prefix for the class name
            values: (               // List of values or key-value pairs for the property
                'value',            // Single value
                (key: 'value')      // Key-value pair: key becomes the class name
            ),
            breakpoints: ('sm', 'md', 'lg', 'xl') // Optional: can be included when calling the mixin
        )
    );
</x-torchlight-code>
```

#### Example Usage:

```html +parse-code
<x-torchlight-code language="scss">
    @@include build-property-classes($flex-properties-map, $responsive: true);
</x-torchlight-code>
```

* **Single Property Classes**: For the `flex` property, individual classes such as `.flex-1`, `.flex-2`, and `.flex-auto` will be created.
* **Responsive Handling**: The `$responsive` flag adds breakpoints for responsive designs if needed.



### `build-composite-classes($properties-map, $responsive: false)`

This mixin is used for generating **composite utility classes** that combine multiple
related properties into a single class. It allows you to define a set of properties that
will be grouped together to form a **reusable unit**. The mixin will take each key-value
pair from the `$properties-map` and generate a class with all the properties included.

#### Data Structure:

* `$properties-map`: A map where each key represents a **class name** and the value is
  another map containing the properties to be applied to that class. This is a **composite
  map** that allows grouping multiple properties into one class.

This is particularly useful for creating classes that apply multiple styles at once, such
as flexbox or grid layouts.

```html +parse-code
<x-torchlight-code language="scss">
    $flex-classes-map: (
        flex-col: (
            props: (
                display: flex,
                flex-direction: column
            )
        ),
    );
</x-torchlight-code>
```

#### Example Usage:

```html +parse-code
<x-torchlight-code language="scss">
    @@include build-composite-classes($flex-classes-map, $responsive: true);
</x-torchlight-code>
```

This will generate classes like `.flex-col` and `.flex-row`, each with the specified
properties applied.

```html +parse-code
<x-torchlight-code language="css">
    .flex-col {
        display: flex;
        flex-direction: column;
    }
</x-torchlight-code>
```

### Key Differences:

* **Composite Classes** (`build-composite-classes`): Groups multiple properties into one
  class for convenience and reusability.
* **Property Classes** (`build-property-classes`): Creates utility classes for individual
  properties, offering more granular control over styles.

In both cases, you can control whether or not **responsive** classes are generated, which
affects whether breakpoints are included in the class names.
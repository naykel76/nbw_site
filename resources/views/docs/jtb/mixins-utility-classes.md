# Utility Class Creators
<!-- TOC -->

- [Unit Based Utility Classes](#unit-based-utility-classes)
    - [`utilityClassesUnit($property, $map, $prefix, $unit: rem)`](#utilityclassesunitproperty-map-prefix-unit-rem)

<!-- /TOC -->


`src/mixins/utilityClassCreators`

<a id="markdown-unit-based-utility-classes" name="unit-based-utility-classes"></a>

## Unit Based Utility Classes

<a id="markdown-utilityclassesunitproperty-map-prefix-unit-rem" name="utilityclassesunitproperty-map-prefix-unit-rem"></a>

### `utilityClassesUnit($property, $map, $prefix, $unit: rem)`

Creates one or many unit based utility classes from a map of sizes.

<p class="txt-red">rem is the default unit</p>

**Example Usage:**

```scss
$text-sizes: (2, 2.5, 3);
@include utilityClassesUnit(font-size, $text-sizes, "txt");
// override default unit
@include utilityClassesUnit(font-size, $text-sizes, "txt", "px");
```

**Output:**

```scss
.txt-2 { font-size: 2rem; }
.txt-2\.5 { font-size: 2.5rem; }
.txt-3 { font-size: 3rem; }
```

<!--

```scss
utilityClasses($property, $map, ?$identifier)
```

Omit the `$identifier` to use the map `$key` as the class name.

```scss
@include utilityClasses(background-color, $color-map);
// output
.bg-brown { background-color: #795649; }
.bg-red { background-color: #dc3848; }
```

```scss
@include utilityClasses(background-color, $color-map, "bg");
// output
.brown { background-color: #795649; }
.red { background-color: #dc3848; }
``` -->

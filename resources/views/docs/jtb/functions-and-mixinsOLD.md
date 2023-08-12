# Mixins
<!-- TOC -->

- [Helper Mixins](#helper-mixins)
    - [`singlePositionProperty($property, $position, $value, $unit: rem)`](#singlepositionpropertyproperty-position-value-unit-rem)
    - [`makePositionProperties($property, $value, $position-map, $unit: rem)`](#makepositionpropertiesproperty-value-position-map-unit-rem)
- [Magic Mixins](#magic-mixins)
- [Create position based properties](#create-position-based-properties)
- [Create Color Shades](#create-color-shades)
- [WIP](#wip)
    - [`colorShadeClasses($color, $value);`](#colorshadeclassescolor-value)
    - [`extendedThemeClass($identifier, $map)`](#extendedthemeclassidentifier-map)
- [Helper Mixins](#helper-mixins-1)
    - [`basicColorScheme($base, ?$border-color, ?$font-color)`](#basiccolorschemebase-border-color-font-color)
    - [`singlePropertyClass($identifier, $property, $value)`](#singlepropertyclassidentifier-property-value)

<!-- /TOC -->

<a id="markdown-helper-mixins" name="helper-mixins"></a>

## Helper Mixins


<a id="markdown-singlepositionpropertyproperty-position-value-unit-rem" name="singlepositionpropertyproperty-position-value-unit-rem"></a>

### `singlePositionProperty($property, $position, $value, $unit: rem)`

Outputs a single position property (not class), works well in loops where one or many positions are required.


<a id="markdown-example-usage" name="example-usage"></a>

###### Example Usage:

This is a contrived example used to demonstrate usage.

```scss
.my-3 {
    @include singlePositionProperty(margin, top, 3);
    @include singlePositionProperty(margin, bottom, 3);
}
```


<a id="markdown-output" name="output"></a>

###### Output:

```scss
.mt-3 {
    margin-top: 3rem;
    margin-bottom: 3rem;
}
```

<!--  -->




<a id="markdown-makepositionpropertiesproperty-value-position-map-unit-rem" name="makepositionpropertiesproperty-value-position-map-unit-rem"></a>

### `makePositionProperties($property, $value, $position-map, $unit: rem)`

Iterates through the list of positions passed in with the `$positions-map` creating the
appropriate `$property` (top, bottom, left, right) based on the `$value`.


<a id="markdown-example-usage" name="example-usage"></a>

###### Example Usage:

```scss
.my-3 {
    @include makePositionProperties(margin, (top, bottom), 3);
}
```


<a id="markdown-output" name="output"></a>

###### Output:

```scss
.mt-3 {
    margin-top: 3rem;
    margin-bottom: 3rem;
}
```




<a id="markdown-magic-mixins" name="magic-mixins"></a>

## Magic Mixins

[Refer to magic classes](/docs/jtb/classes-magic)



<a id="markdown-create-position-based-properties" name="create-position-based-properties"></a>

## Create position based properties


<a id="markdown-syntax" name="syntax"></a>

###### Syntax:

```scss
// omitting the unit will default to 'rem'
@include makePositionProperties($property, $value, $positions);
@include makePositionProperties($property, $value, $positions, $unit: px);
```




<a id="markdown-example-usage" name="example-usage"></a>

###### Example Usage:

This example serves to illustrate the functionality of the mixin. While it may not find direct
application in this particular context, its true potential is better realized when used within
more advanced mixins or functions.

```scss
.py-5{
    @include makePositionProperties(padding, 5, (top, bottom));
}
```

<div class="bx info-light flex va-c">
    <svg class="icon wh-4 fs0 mr-2"> <use xlink:href="/svg/naykel-ui.svg#info"></use> </svg>
    <p>You can use the $axis-position-map to translate an axis or direction to the relevant positions. <code>$positions: map-get($axis-position-map, $direction);</code></p>
</div>


<a id="markdown-output" name="output"></a>

###### Output:

```scss
.py-5 {
  padding-top: 5rem;
  padding-bottom: 5rem;
}

```



# Color Mixins
<!-- TOC -->

- [Create Color Shades](#create-color-shades)
- [WIP](#wip)
    - [`colorShadeClasses($color, $value);`](#colorshadeclassescolor-value)
    - [`extendedThemeClass($identifier, $map)`](#extendedthemeclassidentifier-map)

<!-- /TOC -->



<a id="markdown-create-color-shades" name="create-color-shades"></a>

## Create Color Shades

`$class` - the name of the class (`bg-blue-`, `bg-red-`) <br>
`$color` - create shades based on this color <br>
`$numShades` - specified the number of shades to create <br>
`$lightenBy` - the percentage to reduce each shade by on each iteration. <br>

```scss
@mixin colorShades($class, $color, $numShades: 9, $lightenBy: 0)
```

Usage

```scss
@include colorShades("bg-blue-", hsl(224, 64%, 33%), 9, 6);
```


<a id="markdown-wip" name="wip"></a>

## WIP

<a id="markdown-colorshadeclassescolor-value" name="colorshadeclassescolor-value"></a>

### `colorShadeClasses($color, $value);`

<a id="markdown-extendedthemeclassidentifier-map" name="extendedthemeclassidentifier-map"></a>

### `extendedThemeClass($identifier, $map)`

# Helper and Utility Mixins
<!-- TOC -->

- [Helper Mixins](#helper-mixins)
    - [`singlePositionProperty($property, $position, $value, $unit: rem)`](#singlepositionpropertyproperty-position-value-unit-rem)
    - [`makePositionProperties($property, $value, $position-map, $unit: rem)`](#makepositionpropertiesproperty-value-position-map-unit-rem)
- [Magic Mixins](#magic-mixins)
- [Create position based properties](#create-position-based-properties)
- [Create Color Shades](#create-color-shades)
- [WIP](#wip)
    - [`colorShadeClasses($color, $value);`](#colorshadeclassescolor-value)
    - [`extendedThemeClass($identifier, $map)`](#extendedthemeclassidentifier-map)
- [Helper Mixins](#helper-mixins-1)
    - [`basicColorScheme($base, ?$border-color, ?$font-color)`](#basiccolorschemebase-border-color-font-color)
    - [`singlePropertyClass($identifier, $property, $value)`](#singlepropertyclassidentifier-property-value)

<!-- /TOC -->


<a id="markdown-helper-mixins" name="helper-mixins"></a>

## Helper Mixins

<a id="markdown-basiccolorschemebase-border-color-font-color" name="basiccolorschemebase-border-color-font-color"></a>

### `basicColorScheme($base, ?$border-color, ?$font-color)`

The `basicColorScheme` mixin creates css properties for `background-color`, `border`, and
`color`. The mixin does not create a class, it is used inside it.

```scss
@include basicColorScheme($base, ?$border-color, ?$font-color);
```

```scss
.my-theme{
    @include basicColorScheme(#f43f5e);
}
```


<a id="markdown-singlepropertyclassidentifier-property-value" name="singlepropertyclassidentifier-property-value"></a>

### `singlePropertyClass($identifier, $property, $value)`


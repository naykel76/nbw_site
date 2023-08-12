# Grid Layout

<!-- TOC -->

- [Grid and Gap](#grid-and-gap)
    - [Magic Grid Gap](#magic-grid-gap)
- [Equal width columns (non-responsive)](#equal-width-columns-non-responsive)
    - [Magic columns](#magic-columns)
- [Two column fixed grids](#two-column-fixed-grids)
- [Column Ratio and Magic Classes](#column-ratio-and-magic-classes)
- [Fixed Grids (Non-Responsive)](#fixed-grids-non-responsive)
    - [Two Column (Equal Widths)](#two-column-equal-widths)
    - [Two Column (Un-Equal Widths)](#two-column-un-equal-widths)
- [Magic Grids](#magic-grids)
    - [How do I create custom sizes to the magic grids?](#how-do-i-create-custom-sizes-to-the-magic-grids)
    - [Two Column Magic Grid](#two-column-magic-grid)
- [Variables](#variables)

<!-- /TOC -->
<div class="bx purple txt-lg">Remember, with responsive design use unprefixed utilities to target mobile devices which that take effect on all screen sizes, and override them at larger breakpoints.</div>

<a id="markdown-grid-and-gap" name="grid-and-gap"></a>

## Grid and Gap


Base class sets `display: grid;` and `gap: $grid-gap;`.


```
<div class="grid"></div>
```

You can override the default `gap` with a grid-gap (`gg`) class as defined in the `$grid-gap-sizes` map. For more verbose syntax you can also append the `gap` size directly onto the `grid` class


`$grid-gap-sizes: (0, 1, 1.25, 1.5, 2, 3, 4, 5) !default;`

```
<!-- set the grid gap class separately -->
<div class="grid gg-3"></div>
<!-- apply the gap directly to the gap class -->
<div class="grid-3"></div>
```


<a id="markdown-magic-grid-gap" name="magic-grid-gap"></a>

### Magic Grid Gap

Magic classes can have two or more breakpoint values, and must have at least two maps or you will
get an `undefined` error when compiling.

```
$grid-gap-magic-sizes: ((5, 3, 2), (5, 3), (4, 2), (3, 1)) !default;
@include makeMagicClass("grid-gap", "gg", ($grid-gap-magic-sizes), $unit: "rem");
```

<a id="markdown-equal-width-columns-non-responsive" name="equal-width-columns-non-responsive"></a>

## Equal width columns (non-responsive)

<a id="markdown-magic-columns" name="magic-columns"></a>

### Magic columns

```scss
$fixed-width-magic-columns: ((4, 2, 1), (3, 2, 1), (3, 1, 1), (2, 1)) !default;
```

<a id="markdown-output-example" name="output-example"></a>

###### Output Example
```css
.cols-4-2-1 { grid-template-columns: repeat(1, 1fr); }

@media (min-width: 768px) {
  .cols-4-2-1 { grid-template-columns: repeat(2, 1fr); }
}

@media (min-width: 992px) {
  .cols-4-2-1 { grid-template-columns: repeat(4, 1fr); }
}

```

Equaly
<a id="markdown-two-column-fixed-grids" name="two-column-fixed-grids"></a>

## Two column fixed grids






<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

REVIEW
REVIEW
REVIEW
REVIEW
REVIEW

<a id="markdown-column-ratio-and-magic-classes" name="column-ratio-and-magic-classes"></a>

## Column Ratio and Magic Classes

Two or more numbers separated by a colon represent the number of column(s) and the column ratio, for example, `30:70` indicates a two column layout where the first column is 30% wide and the second column is 70% wide, or  `25:50:25` indicates a three column layout where the first column is 25% wide and the second column is 50% wide and the third column is 25% wide.






<div class="bx danger">Magic mixins expect a list with at least two lists. If you only need to pass a single list, you can do so by creating another empty list, like this:</div>


```scss
@include magicGrid(((), (80, 50)));
```

By doing so, you ensure that the mixin will work as expected, even with only one list in the input."
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
```
$grid-gap-magic-sizes: ((5, 3, 2), (5, 3));
```



<a id="markdown-fixed-grids-non-responsive" name="fixed-grids-non-responsive"></a>

## Fixed Grids (Non-Responsive)

<div class="bx danger">DEPRECIATE: just use width classes</div>

<a id="markdown-two-column-equal-widths" name="two-column-equal-widths"></a>

### Two Column (Equal Widths)

Use the `cols-{n}` class to create a css grid with equally sized columns.

<div class="bx info-light"><strong>TIP:</strong> The number of fixed grid column classes created can be set with the <code>$num-grid-cols</code> value.</div>


```html
<div class="grid cols-3">
  	<div> ... </div>
  	<div> ... </div>
  	<div> ... </div>
</div>
```

<div class="bdr bdr-red bdr-5">
    <div class="grid cols-3">
        <div class="h-2 blue"></div>
        <div class="h-2 blue"></div>
        <div class="h-2 blue"></div>
    </div>
</div>

<a id="markdown-two-column-un-equal-widths" name="two-column-un-equal-widths"></a>

### Two Column (Un-Equal Widths)

Use the colan `cols-{n}:{n}` class to specify the column size ratio of a two column layout.

`cols-20:80`, `cols-25:75`, `cols-30:70` ...

<div class="grid-0 cols-20:80 c-pxy">
    <div class="blue">20%</div>
    <div class="warning">80%</div>
</div>
<div class="grid-0 cols-25:75 c-pxy">
    <div class="blue">25%</div>
    <div class="warning">75%</div>
</div>
<div class="grid-0 cols-30:70 c-pxy">
    <div class="blue">30%</div>
    <div class="warning">70%</div>
</div>
<div class="grid-0 cols-40:60 c-pxy">
    <div class="blue">40%</div>
    <div class="warning">60%</div>
</div>
<div class="grid-0 cols-50:50 c-pxy">
    <div class="blue">50%</div>
    <div class="warning">50%</div>
</div>
<div class="grid-0 cols-60:40 c-pxy">
    <div class="blue">60%</div>
    <div class="warning">40%</div>
</div>
<div class="grid-0 cols-70:30 c-pxy">
    <div class="blue">70%</div>
    <div class="warning">30%</div>
</div>
<div class="grid-0 cols-75:25 c-pxy">
    <div class="blue">75%</div>
    <div class="warning">25%</div>
</div>
<div class="grid-0 cols-80:20 c-pxy">
    <div class="blue">80%</div>
    <div class="warning">20%</div>
</div>


<a id="markdown-magic-grids" name="magic-grids"></a>

## Magic Grids

Magic grids are responsive grid layouts where you can control multiple columns with a single class.

<div class="bx danger">Magic mixins expect a list with at least two lists. If you only need to pass a single list, you can do so by creating another empty list, like this:</div>

```scss
@include magicGrid(((), (80, 50)));
```


<a id="markdown-how-do-i-create-custom-sizes-to-the-magic-grids" name="how-do-i-create-custom-sizes-to-the-magic-grids"></a>

### How do I create custom sizes to the magic grids?

You can use the `makeMagicGrid2Cols` mixin to create custom magic grid layouts.

The mixin accepts a list of lists with 2 or 3 size elements.

```scss
@use "../mixins/makeMagicGrid2Cols" as *;

@include makeMagicGrid2Cols((20,50), (40,60))
```

<a id="markdown-two-column-magic-grid" name="two-column-magic-grid"></a>

### Two Column Magic Grid

<p class="txt-red"><strong>I am conflicted with the naming convention here. Be concise or short?</strong></p>

1. `cols-70_50_100` add first column size only and assume the second (short)
2. `cols-70:30_50:50_100` add the full ratio (concise)

Magic grids classes are used control an entire grid layout with a single class on the parent container.

Each number represents the first colum width and each underscore represents a breakpoint



<div class="grid-0 cols-25_25_100 c-pxy">
    <div class="blue">25_25_100</div>
    <div class="warning">75_75_100</div>
</div>
<div class="grid-0 cols-30_50_100 c-pxy">
    <div class="blue">30_50_100</div>
    <div class="warning">70_50_100</div>
</div>
<div class="grid-0 cols-40_50_100 c-pxy">
    <div class="blue">40_50_100</div>
    <div class="warning">60_50_100</div>
</div>
<div class="grid-0 cols-60_50_100 c-pxy">
    <div class="blue">60_50_100</div>
    <div class="warning">40_50_100</div>
</div>

<div class="grid-0 cols-70_60_100 c-pxy">
    <div class="blue">70_60_100</div>
    <div class="warning">30_40_100</div>
</div>
<div class="grid-0 cols-70_70_100 c-pxy">
    <div class="blue">70_70_100</div>
    <div class="warning">30_30_100</div>
</div>

<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->











<a id="markdown-variables" name="variables"></a>

## Variables

| Variable         | Description                                      |
| ---------------- | ------------------------------------------------ |
| `$num-grid-cols` | Defines the number of fixed grid classes to make |



<div class="grid cols-60_80_100">
    <div class="h-2 bg-orange-5"></div>
    <div class="h-2 bg-blue-5"></div>
</div>

<div class="grid cols-40_60_80_100">
    <div class="h-2 bg-orange-5"></div>
    <div class="h-2 bg-blue-5"></div>
</div>

<div class="grid cols-20_40_60_80_100">
    <div class="h-2 bg-orange-5"></div>
    <div class="h-2 bg-blue-5"></div>
</div>

<div class="grid cols-80_60_100">
    <div class="h-2 bg-orange-5"></div>
    <div class="h-2 bg-blue-5"></div>
</div>

<div class="grid cols-80_60_40_100">
    <div class="h-2 bg-orange-5"></div>
    <div class="h-2 bg-blue-5"></div>
</div>

<div class="grid cols-80_60_40_20_100">
    <div class="h-2 bg-orange-5"></div>
    <div class="h-2 bg-blue-5"></div>
</div>

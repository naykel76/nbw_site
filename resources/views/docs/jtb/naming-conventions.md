# Naming Conventions

<!-- TOC -->

- [Numbers Have Meaning](#numbers-have-meaning)
- [Decimal Numbers](#decimal-numbers)
- [Position and Axis Based Naming Conventions](#position-and-axis-based-naming-conventions)
- [Magic Classes and Descendant Selectors](#magic-classes-and-descendant-selectors)
- [Quick Reference](#quick-reference)

<!-- /TOC -->
<div class="bx info">This page is under review</div>

<a id="markdown-numbers-have-meaning" name="numbers-have-meaning"></a>

## Numbers Have Meaning

<div class="bx danger-light">When using numbers to identify a utility class, do not use a dash to seperate the value unless is is a specific unit.
    For example, fw9 NOT fw-9. Classes that end with -{n} should represent a specific size and nut just used as an identifier.</div>

In most cases numbers used in JTB utility classes have meaning that do more than create a unique class. Unless otherwise specified it is safe to assume that the size unit of measure for any class ending with a number ONLY will be `rem` or in some cases `em`.

For situations where another unit is required the size will be prefixed with the unit type to avoid confusion or conflicts.

For example, the 10 in `myClass-10` equals 10rem, whereas the 10 in `myClass-10px` equals 10px.


<a id="markdown-decimal-numbers" name="decimal-numbers"></a>

### Decimal Numbers

Numbers that require a decimal will be represented with an underscore.

For example 1.25rem will be created as `mx-1_025`, or in the case of .25rem the underscore is omitted `mx-025`


<a id="markdown-position-and-axis-based-naming-conventions" name="position-and-axis-based-naming-conventions"></a>

## Position and Axis Based Naming Conventions

Uses axis naming conventions like 'x' instead of 'lr' and 'y' instead of 'tb' to make it easier to build utility classes.

| Position or Axis | CSS Position(s) |
| :--------------: | :-------------------------: |
| `x` | left and right |
| `y` | top and bottom |
| `xy` | top, bottom, left and right |
| `t` | top |
| `b` | bottom |
| `l` | left |
| `r` | right |


<a id="markdown-magic-classes-and-descendant-selectors" name="magic-classes-and-descendant-selectors"></a>

## Magic Classes and Descendant Selectors

Magic classes or "descendant selectors" are used on a parent element to manage the behavior of direct descendants. It is safe to assume that any class prefixed with `c-` will be a magic class. However in some cases such as `space-x`, or `space-y` the prefix may be replaced.


????? The approach to these classes will be to use the direct descendant selector and exclude the first-child ?????












Using JTB [media queries](/jtb/utilities/responsive), here is an example of what a responsive utility class may look like.

```scss
// at the medium breakpoint the width is 24rem
.md-w-24 {
@include from-lg { width: 24rem; }
}
// at the large breakpoint the width is 48rem
.lg-w-48 {
@include from-lg { width: 48rem; }
}
```

This is a contrived example because there are better classes for specify sizes.

```html
<div class="lg-w-48 md-w-24"></div>
```

<a id="markdown-quick-reference" name="quick-reference"></a>

## Quick Reference

| Convention | Description | Example |
| :---------------- | :---------------------------------- | ------------------- |
| `n:n` | two column ratio (non-responsive) | `cols-60:40` |
| `n:n:n` | three column ratio (non-responsive) | `cols-25:50:25` |
| `n:n_n:n` | two column ratio for magic classes | `cols-60:40_50:50` |
| `n_n_n` | breakpoint {lg}\_{md}\_{sm} | `cols-80_50_100` |
| `n_n_n_n` | breakpoint {xl}\_{lg}\_{md}\_{sm} | `cols-80_60_50_100` |
| `device:property` | Responsive class | `md:bg-blue` |


the ***underscore*** represents a responsive breakpoint and the ***colan*** represents the column(s) and the column ratio.

**Note** Magic classes must have the correct number of elements to work, if you do not want a large break-point just repeat the number. For example `cols-4-4-2`, `cols-4-2-1-1`, or `cols:60-40:50-50:100`.

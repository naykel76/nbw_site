#  Magic Classes

<p class="lead">Magic classes are an alternative approach to responsive classes where you can manage multiple breakpoints actions in a single class. This approach can help to reduce the amount classes applied making you code easier to read and maintain.</p>

<!-- TOC -->

- [How They Work](#how-they-work)
- [Magic Class Mixin](#magic-class-mixin)
- [Position based classes](#position-based-classes)
- [Unit based classes](#unit-based-classes)
- [WIP and Future Considerations](#wip-and-future-considerations)
        - [What about decimal sizes?](#what-about-decimal-sizes)
- [Magic Colours](#magic-colours)

<!-- /TOC -->


<a id="markdown-how-they-work" name="how-they-work"></a>

## How They Work

<div class="bx warning-light flex va-c">
    <svg class="icon wh-4 fs0 mr-2"> <use xlink:href="/svg/naykel-ui.svg#warning"></use> </svg>
    <p>I am debating if I should use the final value to create the base value or just add the base class separately. <code>gg-6-4-2</code> or <code>gg-2 gg-6-4</code>.</p>
</div>

Magic classes are constructed with between two and six breakpoint elements, where the number of
elements determines the number of breakpoints present within the class. Breakpoints are arranged
from right to left, beginning with base value that takes affect on all screen sizes then the
breakpoint size progressively increases as more elements are added.

`identifier-{sm}-base` <br>
`identifier-{md}-{sm}-base` <br>
`identifier-{lg}-{md}-{sm}-base` <br>
`identifier-{xl}-{lg}-{md}-{sm}-base` <br>
`identifier-{xxl}-{xl}-{lg}-{md}-{sm}-base` <br>

<div class="bx warning-light">This is a pretty extreme example used to demonstrate the concept behind "magic classes". Depending on your use case there may be better alternatives such as a <a href="/docs/jtb/responsive-design">responsive design classes</a>.</div>

```scss
.pxy-6-5-4-3-2-1 { padding: 1rem; }

@media (min-width: 576px) {
  .pxy-6-5-4-3-2-1 { padding: 2rem; }
}

@media (min-width: 768px) {
  .pxy-6-5-4-3-2-1 { padding: 3rem; }
}

@media (min-width: 992px) {
  .pxy-6-5-4-3-2-1 { padding: 4rem; }
}

@media (min-width: 1200px) {
  .pxy-6-5-4-3-2-1 { padding: 5rem; }
}

@media (min-width: 1600px) {
  .pxy-6-5-4-3-2-1 { padding: 6rem; }
}
```

<a id="markdown-magic-class-mixin" name="magic-class-mixin"></a>

## Magic Class Mixin

The `makeMagicClass` mixin can create both property based and unit based classes depending on the
parameters you pass in.

```scss
@include makeMagicClass($property, $listsOfValues, $identifier, $unit: rem, $direction: null);
```

<div class="code-first-col"></div>
| Variable       | Description                                                                                          |
| -------------- | ---------------------------------------------------------------------------------------------------- |
| $property      | The css property. (`padding`, `color`, `grid-gap`...)                                                |
| $listsOfValues | A list with at least two lists of values where each value represents a breakpoint. `((3, 2, 1), ())` |
| $identifier    | Used to identify the class. For example, `py` is the identifier for padding top and bottom.          |
| $unit          | Default unit is `rem`. Must add `$unit: null` to remove units completely.                            |
| $direction     | Used to identify the positions required. For example, `x` will return `left` and `right`             |

<div class="bx danger-light flex va-c">
    <svg class="icon wh-4 fs0 mr-2"> <use xlink:href="/svg/naykel-ui.svg#warning"></use> </svg>
    <p>The <code>makeMagicClass</code> mixin requires at least two lists passed into the <code>$listsOfValues</code> or there will be an undefined error when compiling. If you only need a single list of values you can pass an empty list to prevent the error.</p>
</div>

<a id="markdown-position-based-classes" name="position-based-classes"></a>

## Position based classes



<a id="markdown-unit-based-classes" name="unit-based-classes"></a>

## Unit based classes

```scss
@mixin makeMagicClass($property, $listsOfValues, $identifier, $unit: rem);
```

<a id="markdown-example-usage" name="example-usage"></a>

###### Example Usage:

```scss
// empty list indicates single magic class
@include makeMagicClass(grid-gap, ((6, 4, 2), ()), "gg", $unit: "rem");
```

<a id="markdown-output" name="output"></a>

###### Output:

```scss
.gg-6-4-2 {
  grid-gap: 2rem;
}
@media (min-width: 576px) {
  .gg-6-4-2 {
    grid-gap: 4rem;
  }
}
@media (min-width: 768px) {
  .gg-6-4-2 {
    grid-gap: 6rem;
  }
}
```


<a id="markdown-wip-and-future-considerations" name="wip-and-future-considerations"></a>

## WIP and Future Considerations

<a id="markdown-what-about-decimal-sizes" name="what-about-decimal-sizes"></a>

#### What about decimal sizes?



<a id="markdown-magic-colours" name="magic-colours"></a>

## Magic Colours

```scss
@include makeMagicClass(color, ((red, green, blue),()), "bg", $unit: null);
```


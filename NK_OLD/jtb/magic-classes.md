# Magic Classes

- [Overview](#overview)
- [How they work](#how-they-work)
- [Creating Magic Classes](#creating-magic-classes)

## Overview

Magic classes offer an alternative approach to responsive classes, allowing you to
create a single class for controlling values at different breakpoints. This approach can
help to reduce the amount of classes applied, making your code easier to read and
maintain.

<!-- what mixin?? -->

## How they work

Magic classes are constructed with breakpoints, representing various screen sizes. These
breakpoints typically follow a left-to-right order, with the largest size (e.g., `lg`)
listed first and the smallest (e.g., `sm`) listed last.

`{identifier}-{base}` <br>
`{identifier}-{sm}-{base}` <br>
`{identifier}-{md}-{sm}-{base}` <br>
`{identifier}-{lg}-{md}-{sm}-{base}` <br>

`py-5-4-3-2` replaces `lg:py-5 md:py-4 sm:py-3 py-2`

The `{identifier}` is the unique identifier for the property being controlled (e.g. `bg`, `txt`).

**Example:**

A class named `py-5-4-3-2` will apply padding to the top and bottom of an element.
`5rem` at the `large` breakpoint, `4rem` at the `medium` breakpoint, `3rem` at the `small`
breakpoint, and `2rem` as the base value.

## Creating Magic Classes

Use the `generate-magic-classes` mixin to create magic classes. 

```scss
$py: ((4, 3, 2, 1), (3, 2, 1)) !default;
@include generate-magic-classes(padding, $py, "py", $position-or-axis: y, $is-parent: true);
```

For more information check out the [documentation](/jtb-api-reference/#class-generators-mixin-generate-magic-classes)

<!-- There are two types of magic classes:

1. **Responsive Styles in a Single Class**: Manage styles for a single CSS property
across various breakpoints within one class, streamlining your responsive design
workflow.

1. **Direct Descendant Control**: Style the direct children of an element with dedicated
magic classes. This approach reduces the need for multiple classes targeting specific
child elements, leading to cleaner and more maintainable code.


<div class="bx warning-light bdr-3 rounded-1 flex va-c">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#exclamation-circle"></use></svg>
    <div>The default unit is 'rem'</div>
</div> -->





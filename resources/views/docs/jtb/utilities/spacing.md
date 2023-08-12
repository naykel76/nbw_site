# Spacing

<p class="lead">Collection of margin and padding utilities for controlling element spacing.</p>


<!-- MarkdownTOC -->

- [Naming Conventions](#naming-conventions)
- [XY Axis Margin and Padding](#xy-axis-margin-and-padding)
- [Position Based Margin and Padding](#position-based-margin-and-padding)
    - [Horizontal Classes](#horizontal-classes)
    - [Vertical Classes](#vertical-classes)
- [Magic Spacing](#magic-spacing)
- [Base, Gap and Component Spacing Techniques](#base-gap-and-component-spacing-techniques)
    - [Gap](#gap)
    - [Magic Spacing](#magic-spacing-1)
    - [Default Spacing Between Elements or Classes](#default-spacing-between-elements-or-classes)

<!-- /MarkdownTOC -->

<a id="naming-conventions"></a>
## Naming Conventions

Unless otherwise stated, the numeric value in the utility classes refers to number of `rem`. For more information on numeric naming conventions [click here](/introduction#numeric-naming-conventions).

<a id="xy-axis-margin-and-padding"></a>
## XY Axis Margin and Padding

<div class="flex" style="align-items: flex-start;">
    <div class="bdr-blue bdr-3">
        <div class="yellow mxy-1 pxy-sm"><code>mxy-1</code></div>
    </div>
    <div class="bdr-blue bdr-3">
        <div class="yellow mxy-2 pxy-sm"><code>mxy-2</code></div>
    </div>
    <div class="bdr-blue bdr-3">
        <div class="yellow mxy-3 pxy-sm"><code>mxy-3</code></div>
    </div>
    <div class="mr-3"></div>
    <div class="bdr-blue bdr-3">
        <div class="yellow pxy-1 pxy-sm"><code>pxy-1</code></div>
    </div>
    <div class="bdr-blue bdr-3">
        <div class="yellow pxy-2 pxy-sm"><code>pxy-2</code></div>
    </div>
    <div class="bdr-blue bdr-3">
        <div class="yellow pxy-3 pxy-sm"><code>pxy-3</code></div>
    </div>
</div>

<a id="position-based-margin-and-padding"></a>
## Position Based Margin and Padding

Top, Bottom, Left and Right only, use `xy` axis classes for top and bottom.


<a id="horizontal-classes"></a>
### Horizontal Classes
<div class="flex tac" style="align-items: flex-start;">
    <div class="bdr-blue mr bdr-3">
        <div class="yellow ml-1 pxy-sm">Margin Left<br><code>ml-1</code></div>
    </div>
    <div class="bdr-blue mr bdr-3">
        <div class="yellow mr-1 pxy-sm">Margin Right<br><code>mr-1</code></div>
    </div>
    <div class="bdr-blue mr bdr-3">
        <div class="yellow mx-1 pxy-sm">Margin <br><code>mx-1</code></div>
    </div>
    <div class="bdr-blue mr bdr-3">
        <div class="yellow pl-1 pxy-sm">Padding Left<br><code>pl-1</code></div>
    </div>
    <div class="bdr-blue mr bdr-3">
        <div class="yellow pr-1 pxy-sm">Padding Right<br><code>pr-1</code></div>
    </div>
    <div class="bdr-blue mr bdr-3">
        <div class="yellow px-1 pxy-sm">Padding X<br><code>px-1</code></div>
    </div>
</div>

<a id="vertical-classes"></a>
### Vertical Classes
<div class="flex tac" style="align-items: flex-start;">
    <div class="bdr-blue mr bdr-3">
        <div class="yellow mt-1 pxy-sm">Margin Top<br><code>mt-1</code></div>
    </div>
    <div class="bdr-blue mr bdr-3">
        <div class="yellow mb-1 pxy-sm">Margin Bottom<br><code>mb-1</code></div>
    </div>
    <div class="bdr-blue mr bdr-3">
        <div class="yellow my-1 pxy-sm">Margin <br><code>my-1</code></div>
    </div>
    <div class="bdr-blue mr bdr-3">
        <div class="yellow pt-1 pxy-sm">Padding Top<br><code>pt-1</code></div>
    </div>
    <div class="bdr-blue mr bdr-3">
        <div class="yellow pb-1 pxy-sm">Padding Bottom<br><code>pb-1</code></div>
    </div>
    <div class="bdr-blue mr bdr-3">
        <div class="yellow py-1 pxy-sm">Padding Y<br><code>py-1</code></div>
    </div>
</div>


<a id="magic-spacing"></a>
## Magic Spacing



Add padding to all direct decendants `c-pxy-{rem}`

Add space between direct decendants `space-x`

<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->



<a id="base-gap-and-component-spacing-techniques"></a>
## Base, Gap and Component Spacing Techniques

<a id=""></a>
<a id="gap"></a>
### Gap

Create spacing on `flex` and `grid` using the grid gap utility classes `gg`, `gg-1`, `gg-2` ... ect.

<div class="flex-col gg bdr bdr-red bdr-5">
    <div class="blue h-2"></div>
    <div class="blue h-2"></div>
    <div class="blue h-2"></div>
</div>

```html
<div class="flex-col gg">
    <div> ... </div>
    <div> ... </div>
    <div> ... </div>
</div>
```

<a id="magic-spacing-1"></a>
### Magic Spacing

<div class="space-y bdr bdr-red bdr-5">
    <div class="blue h-2"></div>
    <div class="blue h-2"></div>
    <div class="blue h-2"></div>
</div>

```html
<div class="space-y">
    <div> ... </div>
    <div> ... </div>
    <div> ... </div>
</div>
```

<a id="default-spacing-between-elements-or-classes"></a>
### Default Spacing Between Elements or Classes

<div class="bx bdr-red bdr-5">
    <div class="bx blue h-2"></div>
    <div class="bx blue h-2"></div>
    <div class="bx blue h-2"></div>
</div>

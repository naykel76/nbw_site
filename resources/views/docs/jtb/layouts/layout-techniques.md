# Layout Tips and Techniques

<!-- TOC -->

- [Flexbox Two Column Layouts](#flexbox-two-column-layouts)
    - [Fluid column with fixed column (non-responsive)](#fluid-column-with-fixed-column-non-responsive)
    - [Fluid column with responsive fixed column (responsive)](#fluid-column-with-responsive-fixed-column-responsive)

<!-- /TOC -->


<a id="markdown-flexbox-two-column-layouts" name="flexbox-two-column-layouts"></a>

## Flexbox Two Column Layouts

<a id="markdown-fluid-column-with-fixed-column-non-responsive" name="fluid-column-with-fixed-column-non-responsive"></a>

### Fluid column with fixed column (non-responsive)

<div class="flex">
    <div class="w-16 blue pxy tac"> Fixed-Width </div>
    <div class="fg1 pink pxy tac"> Fluid </div>
</div>

```html
<div class="flex">
    <div class="w-16">  ... </div>
    <div class="fg1"> ... </div>
</div>
```

<a id="markdown-fluid-column-with-responsive-fixed-column-responsive" name="fluid-column-with-responsive-fixed-column-responsive"></a>

### Fluid column with responsive fixed column (responsive)

Create a responsive layout by adding a responsive width class to the column and using a responsive
flex-row to make the column 100% width when needed.

<div class="flex-col md:flex-row">
    <div class="md:w-16 blue pxy tac"> Responsive Fixed-Width </div>
    <div class="fg1 pink pxy tac"> Fluid </div>
</div>

How it works:

- `flex-col` on the parent element sets `flex-direction: column` on all screen sizes.
- `md:flex-row` changes the `flex-direction` to `row` from the `md` screen size making all columns 100% wide.
- The first column has a responsive width class of `md:w-16` which sets the width to `16rem` from
  `md` screens
- The second column is fluid because it uses the `fg1` class allowing the column to use what ever space is available.

**Make sure you add responsive classes to both the parent element (row) and its children (columns)**

```html
<div class="flex-col md:flex-row">
    <div class="md:w-16"> ... </div>
    <div class="fg1"> ... </div>
</div>
```





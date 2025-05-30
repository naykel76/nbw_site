# Grid Layout

- [Grid and Gap](#grid-and-gap)
- [Fixed Number of Columns](#fixed-number-of-columns)
- [Flexible Grid](#flexible-grid)


## Grid and Gap

Base class sets `display: grid;` and `gap: $grid-gap;`.

```html
<div class="grid"></div>
```

You can override the default `gap` with a grid-gap (`gap`) class as defined in the `$grid-gap-sizes`
map. For more verbose syntax you can also append the `gap` size directly onto the `grid` class

## Fixed Number of Columns

<div class="container">
    <div class="grid cols-4">
        <div class="h-3 pink"></div>
        <div class="h-3 pink"></div>
        <div class="h-3 pink"></div>
        <div class="h-3 pink"></div>
    </div>
    <div class="grid cols-3">
        <div class="h-3 blue"></div>
        <div class="h-3 blue"></div>
        <div class="h-3 blue"></div>
    </div>
</div>

## Flexible Grid

<style>
.flexible-grid-150 {
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
}
</style>

```html +parse
<x-gt-alert type="danger" class="mt">
NK::TD Create a mixin for this where you can pass in the desired width.
</x-gt-alert>
```

<div class="grid-1 flexible-grid-150 mt">
    <div class="h-3 blue"></div>
    <div class="h-3 blue"></div>
    <div class="h-3 blue"></div>
    <div class="h-3 blue"></div>
    <div class="h-3 blue"></div>
</div>

```scss
.flexible-grid-150 {
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
}
```
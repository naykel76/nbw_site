# Grid Techniques

- [Flexible Grid](#flexible-grid)
- [Understanding `auto-fill` vs. `auto-fit`](#understanding-auto-fill-vs-auto-fit)


## Flexible Grid

Creating a flexible grid layout that adapts to the available space can be achieved using the CSS
Grid Layout module. The key to this flexibility lies in the `grid-template-columns` property,
particularly when combined with the `repeat()`, `auto-fit`, and `minmax()` functions.

```css
.flexible-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
}
```

Here's a breakdown of what each part means:

- **`repeat(auto-fit, ...)`**: This function allows the grid to automatically adjust the number of
  columns based on the available space. `auto-fit` will create as many columns as will fit in the
  container.

- **`minmax(150px, 1fr)`**: This function sets the minimum and maximum sizes for each column. 
  - **`150px`**: This is the minimum width each column can have.
  - **`1fr`**: This is the maximum width each column can have, where `1fr` represents a fractional
    unit of the remaining space in the grid container.

In summary, this rule will create a flexible grid where each column is at least 150px wide but can
expand to fill available space equally. If there is enough space, more columns will be added to fit
the container width.

## Understanding `auto-fill` vs. `auto-fit`

- **`auto-fill`**: Generates as many columns as can fit into the container without extending its
  boundaries. Unlike `auto-fit`, `auto-fill` retains column tracks even if they are empty,
  potentially leading to unused space within the grid.

- **`auto-fit`**: Similar to `auto-fill`, it fills the container with as many columns as possible.
  However, `auto-fit` collapses empty columns, allowing the remaining columns to expand and utilize
  the freed space.


# Table
<a id="markdown-table" name="table"></a>

<!-- TOC -->

- [Base table](#base-table)
- [Flexible grid table](#flexible-grid-table)
    - [How it works (WIP)](#how-it-works-wip)

<!-- /TOC -->

## Base table
<a id="markdown-base-table" name="base-table"></a>

<table>
    <thead>
        <tr>
            <th>Table Header</th>
            <th>Table Header</th>
            <th>Table Header</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Table Data</td>
            <td>Table Data</td>
            <td>Table Data</td>
        </tr>
        <tr>
            <td>Table Data</td>
            <td>Table Data</td>
            <td>Table Data</td>
        </tr>
        <tr>
            <td>Table Data</td>
            <td>Table Data</td>
            <td>Table Data</td>
        </tr>
    </tbody>
</table>

## Flexible grid table
<a id="markdown-flexible-grid-table" name="flexible-grid-table"></a>

### How it works (WIP)
<a id="markdown-how-it-works" name="how-it-works"></a>

To begin with, we layout the table using regular table-layout CSS.

The `<thead>` and `<tbody>` will become children grid items, however, it's not the `<thead>`,
`<tbody>`, or even the `<tr>`s we're concerned with. What we want to do is lay out our `<th>`s and
`<td>`s on this grid.

A workaround is to use `display: contents` on the `<thead>`, `<tbody>`, and `<tr>`s. This removes
the them from the Grid layout, bypassing them, and promotes their children (the
`<th>`s and `<td>`s) to participate in the the `<table>` grid instead.

https://www.youtube.com/watch?v=cs37yx73b1o

https://adamlynch.com/flexible-data-tables-with-css-grid/

Add the `grid-table` class

# Table

- [Base table](#base-table)
- [Styles](#styles)
  - [Rounded corners](#rounded-corners)
  - [Row divider](#row-divider)

## Base table

Tables have no specific styling by default.

<div class="ignore-nk-styles"></div>

| TableHeader | TableHeader | TableHeader |
| :---------- | :---------- | :---------- |
| TableData   | TableData   | TableData   |
| TableData   | TableData   | TableData   |
| TableData   | TableData   | TableData   |


```html
<table>
    <thead>
        <tr>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> </td>
        </tr>
    </tbody>
</table>
```


## Styles

Apply styles using utility classes.

### Rounded corners
Add rounded corners to the table by wrapping the `table` in an element and set `overflow-auto` and the desired `border-radius` on the wrapper.


<div class="pxy-0 rounded overflow-auto mb">
    <table class="mxy-0">
        <thead>
            <tr> <th>Table Header</th> <th>Table Header</th> <th>Table Header</th> </tr>
        </thead>
        <tbody>
            <tr> <td>Table Data</td> <td>Table Data</td> <td>Table Data</td> </tr>
            <tr> <td>Table Data</td> <td>Table Data</td> <td>Table Data</td> </tr>
        </tbody>
    </table>
</div>

```html
<div class="rounded overflow-auto">
    <table> ... </table>
</div>
```


### Row divider

You can add a row divider by adding the `divide-y` class to the `tbody` element, or a border class
to the `tr` element.

<div class="pxy-0 overflow-auto">
    <table>
        <thead>
            <tr> <th>Table Header</th> <th>Table Header</th> <th>Table Header</th> </tr>
        </thead>
        <tbody class="divide-y">
            <tr> <td>Table Data</td> <td>Table Data</td> <td>Table Data</td> </tr>
            <tr> <td>Table Data</td> <td>Table Data</td> <td>Table Data</td> </tr>
            <tr> <td>Table Data</td> <td>Table Data</td> <td>Table Data</td> </tr>
        </tbody>
    </table>
</div>


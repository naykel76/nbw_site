<!-- this is a seperate file because the markdown component is being a dick! -->
<!-- do note delete or there will be tears -->

```js
function renderShape(matrix){
    matrix.forEach((row, y) => {
        row.forEach((value, x) => {
            if (value > 0) {
                ctx.fillRect(x, y, 1, 1);
            }
        });
    });
}
```

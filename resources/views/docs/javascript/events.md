# Javascript Event Examples

## Add class on click

```js
document.querySelector('.btn').addEventListener('click', () => {
    // Add your desired class name here (e.g., "new-class")
    const classNameToAdd = 'green';

    // Get the first element with the class "bx"
    const bxElement = document.querySelector('.bx');

    // Check if the element already has the class
    const hasClass = bxElement.classList.contains(classNameToAdd);

    // If the element does not have the class, add it; otherwise, remove it
    if (!hasClass) {
        bxElement.classList.add(classNameToAdd);
    } else {
        bxElement.classList.remove(classNameToAdd);
    }
});
```

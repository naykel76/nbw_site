# Position and Alignment Tips and Techniques


## Centering Elements

When using `margin: auto;` you can add `flex` or `grid` to parent element to center items vertically.



Centering Techniques
Vertical Centering with Flexbox


---

.Aligner {
  display: flex;
  align-items: center;
  justify-content: center;
}

.Aligner-item {
  max-width: 50%;
}

.Aligner-item--top {
  align-self: flex-start;
}

.Aligner-item--bottom {
  align-self: flex-end;
}

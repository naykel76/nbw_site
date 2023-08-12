


Min width will grow to the width of the parent unless you specify a max width or the parent is a flex container.

<div class="bx minw-400">
    <code>minw-400</code> This has a min width.
</div>

<div class="bx minw-400 maxw-600">
    <code>minw-400</code> <code>max600</code> This has a min and max width.
</div>

<div class="bx maxw-400">
    <code>max400</code> This has a maximum width.
</div>

The max width will not shrink to fit content as it uses the min() function which returns the smallest possible values which at full screen is {n}px and small screen is 95%.

<div class="bx maxw-400">
    <code>max400</code> This has a maximum width. There is more content here and the box should stay the same and content will wrap to new line.
</div>

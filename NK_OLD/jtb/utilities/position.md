# Position Utilities

<p class="lead">Utilities for controlling the placement of positioned elements.</p>

- A `fixed` position element is positioned relative to the viewport, or the browser window itself.
- A `absolute` position element will be relative to the next parent element with relative positioning.

The axis based positions `x`, `y`, and `xy` will set the position properties to stretch along the specified axis.

For example, `pos-x` will set the `left: 0;` and `right: 0;` properties

<div class="flex gap">
    <div class="tac">
        <div class="relative bg-stripes-pink wh-6">
            <div class="absolute pos-x pink h-2"></div>
        </div>
        <code>pos-x</code>
    </div>
    <div class="tac">
        <div class="relative bg-stripes-pink wh-6">
            <div class="absolute pos-y pink w-3"></div>
        </div>
        <code>pos-y</code>
    </div>
    <div class="tac">
        <div class="relative bg-stripes-pink wh-6">
            <div class="absolute pos-xy pink"></div>
        </div>
        <code>pos-xy</code>
    </div>
    <div class="tac">
        <div class="relative bg-stripes-pink wh-6">
            <div class="absolute pos-t pink wh-2"></div>
        </div>
        <code>pos-t</code>
    </div>
    <div class="tac">
        <div class="relative bg-stripes-pink wh-6">
            <div class="absolute pos-b pink wh-2"></div>
        </div>
        <code>pos-b</code>
    </div>
    <div class="tac">
        <div class="relative bg-stripes-pink wh-6">
            <div class="absolute pos-l pink wh-2"></div>
        </div>
        <code>pos-l</code>
    </div>
    <div class="tac">
        <div class="relative bg-stripes-pink wh-6">
            <div class="absolute pos-r pink wh-2"></div>
        </div>
        <code>pos-r</code>
    </div>
</div>

Classes can be stacked for better control.

<div class="flex gap">
    <div class="tac">
        <div class="relative bg-stripes-blue wh-6">
            <div class="absolute pos-b pos-l blue wh-2"></div>
        </div>
        <code>pos-b</code> <code>pos-l</code>
    </div>
    <div class="tac">
        <div class="relative bg-stripes-blue wh-6">
            <div class="absolute pos-b pos-r blue wh-2"></div>
        </div>
        <code>pos-b</code> <code>pos-r</code>
    </div>
    <div class="tac">
        <div class="relative bg-stripes-blue wh-6">
            <div class="absolute pos-x pos-t blue h-2"></div>
        </div>
        <code>pos-t</code> <code>pos-x</code>
    </div>
    <div class="tac">
        <div class="relative bg-stripes-blue wh-6">
            <div class="absolute pos-x pos-b blue h-2"></div>
        </div>
        <code>pos-b</code> <code>pos-x</code>
    </div>
</div>





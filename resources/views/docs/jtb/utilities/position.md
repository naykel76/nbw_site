# Position Utilities

<p class="lead">Utilities for controlling the placement of positioned elements.</p>

- A `fixed` position element is positioned relative to the viewport, or the browser window itself.
- A `absolute` position element will be relative to the next parent element with relative positioning.

The axis based positions `x`, `y`, and `xy` will set the position properties to stretch along the specified axis.

For example, `pos-x` will set the `left: 0;` and `right: 0;` properties

<div class="flex gg">
    <div class="tac">
        <div class="relative orange wh-100px">
            <div class="absolute pos-x bg-orange-4 h-2"></div>
        </div>
        <code>pos-x</code>
    </div>
    <div class="tac">
        <div class="relative orange wh-100px">
            <div class="absolute pos-y bg-orange-4 w-3"></div>
        </div>
        <code>pos-y</code>
    </div>
    <div class="tac">
        <div class="relative orange wh-100px">
            <div class="absolute pos-xy bg-orange-4"></div>
        </div>
        <code>pos-xy</code>
    </div>
    <div class="tac">
        <div class="relative orange wh-100px">
            <div class="absolute pos-t bg-orange-4 wh-2"></div>
        </div>
        <code>pos-t</code>
    </div>
    <div class="tac">
        <div class="relative orange wh-100px">
            <div class="absolute pos-b bg-orange-4 wh-2"></div>
        </div>
        <code>pos-b</code>
    </div>
    <div class="tac">
        <div class="relative orange wh-100px">
            <div class="absolute pos-l bg-orange-4 wh-2"></div>
        </div>
        <code>pos-l</code>
    </div>
    <div class="tac">
        <div class="relative orange wh-100px">
            <div class="absolute pos-r bg-orange-4 wh-2"></div>
        </div>
        <code>pos-r</code>
    </div>
</div>

Classes can be stacked for better control.

<div class="flex gg">
    <div class="tac">
        <div class="relative blue wh-100px">
            <div class="absolute pos-b pos-l bg-blue-4 wh-2"></div>
        </div>
        <code>pos-b</code> <code>pos-l</code>
    </div>
    <div class="tac">
        <div class="relative blue wh-100px">
            <div class="absolute pos-b pos-r bg-blue-4 wh-2"></div>
        </div>
        <code>pos-b</code> <code>pos-r</code>
    </div>
    <div class="tac">
        <div class="relative blue wh-100px">
            <div class="absolute pos-x pos-t bg-blue-4 h-2"></div>
        </div>
        <code>pos-t</code> <code>pos-x</code>
    </div>
    <div class="tac">
        <div class="relative blue wh-100px">
            <div class="absolute pos-x pos-b bg-blue-4 h-2"></div>
        </div>
        <code>pos-b</code> <code>pos-x</code>
    </div>
</div>





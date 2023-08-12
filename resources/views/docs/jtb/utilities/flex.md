# Flexbox Utilities

<!-- MarkdownTOC -->

- [Justify Content](#justify-content)
- [Justify Items](#justify-items)
- [Justify Self](#justify-self)
- [Align Content](#align-content)
- [Align Items](#align-items)
- [Align Self](#align-self)
- [Place Content](#place-content)
- [Place Items](#place-items)
- [Place Self](#place-self)
- [---](#---)
- [Justify Content](#justify-content-1)
- [Align Content](#align-content-1)
- [Align Items](#align-items-1)
- [Place Content](#place-content-1)
- [Place Items](#place-items-1)
- [Flex](#flex)

<!-- /MarkdownTOC -->

Utilities for controlling how an individual flex or grid item is positioned along its container's cross axis.

<a id="justify-content"></a>
## Justify Content
<a id="justify-items"></a>
## Justify Items
<a id="justify-self"></a>
## Justify Self
<a id="align-content"></a>
## Align Content
<a id="align-items"></a>
## Align Items
<a id="align-self"></a>
## Align Self
<a id="place-content"></a>
## Place Content
<a id="place-items"></a>
## Place Items
<a id="place-self"></a>
## Place Self


---
<a id="---"></a>
---
---
---

Utilities for controlling how an individual flex or grid item is positioned along its container's cross axis.

<div class="bx info-light">In the context of flex-row vertical and horizontal shorthand change direction!</div>

<a id="justify-content-1"></a>
## Justify Content

Utilities for controlling how flex and grid items are positioned along a container's main axis.

<div class="grid cols-2">
    <div>
        <code>justify-start</code> or <code>ha-l</code>
        <div class="flex ha-l gg orange mt-025">
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
        </div>
    </div>
    <div>
        <code>justify-end</code> or <code>ha-r</code>
        <div class="flex ha-r gg orange mt-025">
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
        </div>
    </div>
    <div>
        <code>justify-center</code> or <code>ha-c</code>
        <div class="flex ha-c gg orange mt-025">
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
        </div>
    </div>
    <div>
        <code>space-between</code>
        <div class="flex space-between gg orange mt-025">
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
        </div>
    </div>
    <div>
        <code>space-around</code>
        <div class="flex space-around gg orange mt-025">
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
        </div>
    </div>
    <div>
        <code>space-evenly</code>
        <div class="flex space-evenly gg orange mt-025">
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
            <div class="wh-3 bg-orange-4 flex"></div>
        </div>
    </div>
</div>


<a id="align-content-1"></a>
## Align Content

Utilities for controlling how rows are positioned in multi-row flex and grid containers.

<a id="align-items-1"></a>
## Align Items

Utilities for controlling how flex and grid items are positioned along a container's cross axis.

<div class="grid cols-2">
    <div>
        <code>items-start</code> or <code>va-t</code>
        <div class="flex items-start gg blue h-5 mt-025">
            <div class="w-4 h-2 bg-blue-5 flex"></div>
            <div class="w-4 h-4 bg-blue-5 flex"></div>
            <div class="w-4 h-3 bg-blue-5 flex"></div>
        </div>
    </div>
    <div>
        <code>items-end</code> or <code>va-b</code>
        <div class="flex items-end gg blue h-5 mt-025">
            <div class="w-4 h-2 bg-blue-5 flex"></div>
            <div class="w-4 h-4 bg-blue-5 flex"></div>
            <div class="w-4 h-3 bg-blue-5 flex"></div>
        </div>
    </div>
    <div>
        <code>items-center</code> or <code>va-c</code>
        <div class="flex items-center gg blue h-5 mt-025">
            <div class="w-4 h-2 bg-blue-5 flex"></div>
            <div class="w-4 h-4 bg-blue-5 flex"></div>
            <div class="w-4 h-3 bg-blue-5 flex"></div>
        </div>
    </div>
    <div>
        <code>items-baseline</code>
        <div class="flex items-baseline gg blue h-5 mt-025">
            <div class="w-4 h-2 bg-blue-5 flex"></div>
            <div class="w-4 h-4 bg-blue-5 flex"></div>
            <div class="w-4 h-3 bg-blue-5 flex"></div>
        </div>
    </div>
    <div>
        <code>items-stretch</code>
        <div class="flex items-stretch gg blue h-5 mt-025">
            <div class="w-4 bg-blue-5 flex"></div>
            <div class="w-4 bg-blue-5 flex"></div>
            <div class="w-4 bg-blue-5 flex"></div>
        </div>
    </div>
</div>

<a id="place-content-1"></a>
## Place Content

You need to use flex-wrap:wrap; to be able to use align-content with flexbox

<a id="place-items-1"></a>
## Place Items

Utilities for controlling how items are justified and aligned at the same time.

<a id="flex"></a>
## Flex

| Class       | Property          | Description                                                                     |
| ----------- | ----------------- | ------------------------------------------------------------------------------- |
| `fsg1`      | `flex: 1 1 0%;`   | Allow a flex item to grow and shrink as needed, ignoring its initial size:      |
| `fs-auto`   | `flex: 0 1 auto;` | Allow a flex item to shrink but not grow, taking into account its initial size: |
| `fsg-auto`  | `flex: 1 1 auto;` | Allow a flex item to grow and shrink, taking into account its initial size:     |
| `flex-none` | `flex: none;`     | Prevent a flex item from growing or shrinking:                                  |


# Button Component

<!-- TOC -->

- [Overview](#overview)
    - [Theme and Alert Buttons](#theme-and-alert-buttons)
    - [Other Buttons](#other-buttons)
- [Outline Buttons](#outline-buttons)
- [Disabled Buttons](#disabled-buttons)
- [Button Sizes](#button-sizes)
- [Button Icons (NEEDS REVIEW)](#button-icons-needs-review)

<!-- /TOC -->

<a id="markdown-overview" name="overview"></a>

## Overview

The Button class (btn) follows an 'opt-out' approach, allowing you to add the button class and
theme you desire while easily removing or overriding any styles to achieve your desired
appearance.

    <button class="btn primary"> ... </button>

<a id="markdown-theme-and-alert-buttons" name="theme-and-alert-buttons"></a>

### Theme and Alert Buttons
<div>
    <button class="btn primary">primary</button>
    <button class="btn secondary">secondary</button>
    <button class="btn accent">accent</button>
    <button class="btn danger">danger</button>
    <button class="btn info">info</button>
    <button class="btn success">success</button>
    <button class="btn warning">warning</button>
</div>

<a id="markdown-other-buttons" name="other-buttons"></a>

### Other Buttons

<div class="grid-1 cols-6 mt">
    <button class="btn stone">stone</button>
    <button class="btn brown">brown</button>
    <button class="btn red">red</button>
    <button class="btn orange">orange</button>
    <button class="btn amber">amber</button>
    <button class="btn yellow">yellow</button>
    <button class="btn lime">lime</button>
    <button class="btn emerald">emerald</button>
    <button class="btn green">green</button>
    <button class="btn teal">teal</button>
    <button class="btn cyan">cyan</button>
    <button class="btn sky">sky</button>
    <button class="btn blue">blue</button>
    <button class="btn indigo">indigo</button>
    <button class="btn purple">purple</button>
    <button class="btn fuchsia">fuchsia</button>
    <button class="btn pink">pink</button>
    <button class="btn rose">rose</button>
</div>


---

<a id="markdown-outline-buttons" name="outline-buttons"></a>

## Outline Buttons

Simply add the `outline` class for outlined buttons.

    <button class="btn primary outline"> ... </button>

<button class="btn primary outline"> Primary </button>
<button class="btn secondary outline"> Secondary </button>
<button class="btn accent outline"> Accent </button>
<button class="btn success outline"> Success </button>
<button class="btn danger outline"> Danger </button>
<button class="btn warning outline"> Warning </button>
<button class="btn info outline"> Info </button>

---


<a id="markdown-disabled-buttons" name="disabled-buttons"></a>

## Disabled Buttons

Add the `disabled` Boolean HTML attribute, which prevents the user from interacting with the button. Alternatively you can add the `disabled` class.</p>

<div class="bx info-light"><strong>TIP:</strong> The <code>disabled</code> class is not tied to a control and is handy way to dull down any element!</div>

    <button class="primary disabled"> ... </button>
    <button class="primary" disabled> ... </button>

<button disabled class="btn primary"> Primary </button>
<button disabled class="btn secondary"> Secondary </button>
<button disabled class="btn success"> Success </button>
<button disabled class="btn danger"> Danger </button>
<button disabled class="btn warning"> Warning </button>
<button disabled class="btn info"> Info </button>

---

<a id="markdown-button-sizes" name="button-sizes"></a>

## Button Sizes

Add `.sm`, `.md` or `.lg` modifier classes to change the size.

    <button class="sm"> ... </button>

<div>
    <button class="sm"> Small </button>
    <button> Normal </button>
    <button class="md"> Medium </button>
    <button class="lg"> Large </button>
</div>


Buttons sizes also play well with form controls.

<div class="mt">
    <input type="text" class="sm" placeholder="Small">
    <button class="sm"> Small </button>
    <!-- <a href="" class="btn sm">SMALL</a> -->
</div>


<div class="mt">
    <input type="text" placeholder="Normal">
    <button> Normal </button>
</div>

<div class="mt">
    <input type="text" class="md" placeholder="Medium">
    <button class="md"> Medium </button>
</div>

<div class="mt">
    <input type="text" class="lg" placeholder="Large">
    <button class="lg"> Large </button>
</div>

---

<a id="markdown-button-icons-needs-review" name="button-icons-needs-review"></a>

## Button Icons (NEEDS REVIEW)

For best results wrap the button text in `span` element.

    <button>
        <svg class="icon">
            <use xlink:href="/svg/naykel-ui.svg#save"></use>
        </svg>
        <span> Normal </span>
    </button>

<!-- this is for spacing :) -->
<div></div>

<button class="sm">
    <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#save"></use> </svg>
    <span> Small </span>
</button>

<button>
    <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#save"></use> </svg>
    <span> Normal </span>
</button>

<button class="md">
    <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#save"></use> </svg>
    <span> Medium </span>
</button>

<button class="lg">
    <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#save"></use> </svg>
    <span> Large </span>
</button>

---





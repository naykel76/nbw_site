# Box Component

<p class="lead">Box component that offers a versatile structure for creating customized boxes for a range of components.</p>

<!-- TOC -->

- [Base Layout](#base-layout)
- [Apply Themes](#apply-themes)
- [Examples](#examples)

<!-- /TOC -->
<a id="markdown-base-layout" name="base-layout"></a>

## Base Layout

The Box Component consists of three primary elements: `bx-header`, `bx-content`, and `bx-footer`.
These elements form the core structure of the box, enabling developers to create customized boxes
according to their specific needs.

Developers have the flexibility to combine these elements in various ways to build components like
cards, alerts, and notifications. Whether using all three elements or a subset, the Box Component
provides the base layout structure.

By leveraging the Box Component, developers can easily create visually appealing and functional
boxes and its flexible structure allows for seamless customization, ensuring that each component
can be tailored to meet unique requirements while maintaining a cohesive design.

<div class="bx">
    <div class="bx-header">
        <div class="bx-title">Box with Header and Footer</div>
    </div>
    <div class="bx-content">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, in illum. Id qui, doloribus consectetur ex nemo eum excepturi quos?</p>
    </div>
    <div class="bx-footer tar">
        <button class="btn primary outline">Cancel</button>
        <button class="btn primary">Save</button>
    </div>
</div>


```html
<div class="bx">
    <div class="bx-header">
        <div class="bx-title"> ... </div>
    </div>
    <div class="bx-content"> ... </div>
    <div class="bx-footer"> ... </div>
</div>
```

<a id="markdown-apply-themes" name="apply-themes"></a>

## Apply Themes

You can apply any theme or combine multiple themes to achieve the desired visual style and enhance
the overall aesthetics of the component.

<div class="grid cols-2">
    <div class="bx primary">
        <div class="bx-title">Primary Theme</div>
        <p>Lorem ipsum dolor, sit amet consectetur elit cow. Recusandae, aliquam?</p>
    </div>
    <div class="bx secondary">
        <div class="bx-title">Secondary Theme</div>
        <p>Lorem ipsum dolor, sit amet consectetur elit cow. Recusandae, aliquam?</p>
    </div>
    <div class="bx dark">
        <div class="bx-title">Dark Theme</div>
        <p>Lorem ipsum dolor, sit amet consectetur elit cow. Recusandae, aliquam?</p>
    </div>
    <div class="bx light">
        <div class="bx-title">Dark Theme</div>
        <p>Lorem ipsum dolor, sit amet consectetur elit cow. Recusandae, aliquam?</p>
    </div>
</div>







<a id="markdown-examples" name="examples"></a>

## Examples

Remove the border and padding from the box header.

<div class="grid cols-2 tac">
    <div class="bx">
        <div class="bx-header bdr-0 pxy-0">
            <img src="/images/samples/sample001-600x338.jpg" alt="Naykel sample">
        </div>
        <div class="bx-content">
            <div class="bx-title">Designed for Active Life</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolor magna lorem ipsum dolor sit amet. Condimentum vitae sapien </p>
        </div>
    </div>
    <div class="bx">
        <div class="bx-header">
            <img src="/images/samples/sample003-600x338.jpg" alt="Naykel sample">
        </div>
        <div class="bx-content">
            <div class="bx-title">Your Journey Begins</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolor magna lorem ipsum dolor sit amet. Condimentum vitae sapien </p>
        </div>
    </div>
</div>

```html
<div class="bx">
    <div class="bx-header bdr-0 pxy-0"> ... </div>
    <div class="bx-content">
        <div class="bx-title"> ... </div>
        <p></p>
    </div>
</div>
```

<div class="grid cols-2 tac mt">
    <div>
        <img src="/images/samples/sample001-600x338.jpg" alt="Naykel sample">
        <div class="bx bdr-0">
            <div class="bx-title">Designed for Active Life</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolor magna lorem ipsum dolor sit amet. Condimentum vitae sapien </p>
        </div>
    </div>
    <div>
        <img src="/images/samples/sample003-600x338.jpg" alt="Naykel sample">
        <div class="bx bdr-0">
            <div class="bx-title">Your Journey Begins</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolor magna lorem ipsum dolor sit amet. Condimentum vitae sapien </p>
        </div>
    </div>
</div>

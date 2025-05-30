# Spacing and Content Gap

<!-- TOC -->

- [Heading Spacing](#heading-spacing)
- [Adjacent Elements](#adjacent-elements)
- [Flex or Grid Parent](#flex-or-grid-parent)
- [Combinations for testing](#combinations-for-testing)

<!-- /TOC -->
<a id="markdown-heading-spacing" name="heading-spacing"></a>

## Heading Spacing

The gap before the heading is based on `em` so the larger the heading the larger the gap. The
space under the heading will be consistent regardless of the heading size.

The spacing before the heading is sized using `em`, hence a larger heading results in a larger
gap. However, the space following the heading remains uniform, irrespective of the heading's size.

<div class="flex va-c my">
    <svg class="icon wh-2 txt-blue">
        <use xlink:href="/svg/naykel-ui.svg#information-circle"></use>
    </svg>
    <span><code>H1</code> is generally a first child so the gap will be 0</span>
</div>

<div class="grid cols-5 items-start">
    <div class="bdr">
        <p>content before</p>
        <h2 class="bdr bdr-blue">Heading 2</h2>
        <p>content after</p>
    </div>
    <div class="bdr">
        <p>content before</p>
        <h3 class="bdr bdr-blue">Heading 3</h3>
        <p>content after</p>
    </div>
    <div class="bdr">
        <p>content before</p>
        <h4 class="bdr bdr-blue">Heading 4</h4>
        <p>content after</p>
    </div>
    <div class="bdr">
        <p>content before</p>
        <h5 class="bdr bdr-blue">Heading 5</h5>
        <p>content after</p>
    </div>
    <div class="bdr">
        <p>content before</p>
        <h6 class="bdr bdr-blue">Heading 6</h6>
        <p>content after</p>
    </div>
</div>

<a id="markdown-adjacent-elements" name="adjacent-elements"></a>

## Adjacent Elements

All elements adjacent to each other should, by default, have a `top-margin`. This is to ensure
proper spacing between them. The use of `top-margin` helps to create a clear visual separation
between elements, improving the readability and aesthetics of the layout.

However, if needed, this default `top-margin` can be overridden using utility classes. This allows
for greater flexibility and control over the layout, enabling you to adjust the spacing to suit
the specific needs of your design.

The size of the `top-margin` is based on the `$content-gap` variable and can be changed in the
`variables/_base.scss` file. This provides a consistent basis for the spacing between elements,
ensuring a uniform look and feel across the site. Below are examples of adjacent elements.

 <div class="grid cols-2">
    <div>
        <h4>With default gap</h4>
        <div class="bx">
            <div class="pink pxy-075 flex">Flex parent</div>
            <p class="pink pxy-075">Paragraph</p>
            <div class="pink pxy-075 grid">Grid parent</div>
            <div class="pink pxy-075 bx rounded-0">Box element</div>
            <div class="pink pxy-075 grid">Grid parent</div>
            <form class="pink pxy-075">Form element</form>
            <table class="pink pxy-075">
                <td class="py-0">Table element</td>
            </table>
            <ul class="pink pxy-075 ml-0">List element</ul>
        </div>
    </div>
    <div>
        <h4>Overriding tests</h4>
        <div class="bx self-start">
            <div class="blue pxy-075 my-025 flex">Flex parent</div>
            <p class="blue pxy-075 my-025">Paragraph</p>
            <div class="blue pxy-075 my-025 grid">Grid parent</div>
            <div class="blue pxy-075 my-025 bx rounded-0">Box element</div>
            <div class="blue pxy-075 my-025 grid">Grid parent</div>
            <form class="blue pxy-075 my-025">Form element</form>
            <table class="blue pxy-075 my-025">
                <td class="py-0">Table element</td>
            </table>
            <ul class="blue pxy-075 my-025 ml-0">List element</ul>
        </div>
    </div>
</div>

<a id="markdown-flex-or-grid-parent" name="flex-or-grid-parent"></a>

## Flex or Grid Parent

Elements inside a `flex` or `grid` parent:

- should not have any `margin-top`
- use a `gap` class for sibling spacing

<a id="markdown-combinations-for-testing" name="combinations-for-testing"></a>

## Combinations for testing

Ensure there is consistent spacing between the elements below. If the spacing is inconsistent,
there may be an issue with the `content_gap.scss` file.

<!-- DO NOT USE THE BX CLASS -->

<div class="bx bg-stripes-pink">
    <div class="flex pxy warning-light rounded-05">Flex parent</div>
    <div class="grid pxy warning-light rounded-05">grid parent</div>
    <div class="bx pxy warning-light rounded-05">Box element</div>
    <div class="frm-row pxy warning-light rounded-05">Form row</div>
    <p class="frm-row pxy warning-light rounded-05">Paragraph element</p>
    <form class="pxy warning-light rounded-05">Form element</form>
    <table class="pxy warning-light rounded-05"><tr><th>Table element</th></tr></table>
    <ul class="pxy warning-light rounded-05">ul element</ul>
    <input type="text" placeholder="Input (control only)" class="w-full">
</div>

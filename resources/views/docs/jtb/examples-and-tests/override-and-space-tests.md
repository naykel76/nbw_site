<!-- MarkdownTOC -->

- [Box Component Combinations](#box-component-combinations)
    - [Box Component with Flex and Grid](#box-component-with-flex-and-grid)
    - [Paragraph Spacing Examples](#paragraph-spacing-examples)
    - [Form Row Spacing](#form-row-spacing)
- [Class Override Testing](#class-override-testing)
    - [Margin and Padding](#margin-and-padding)
    - [Overriding Magic Classes](#overriding-magic-classes)

<!-- /MarkdownTOC -->

### Flex and Grid Combinations

`.flex + ?` or `.grid + ?`
<div class="bdr bdr-red pxy-025">
    <div class="flex danger-light pxy-05">
        <div>This <code>flex-parent</code> is a <code>first-child</code> and should not have any margin-top.</div>
    </div>
    <div class="flex danger-light pxy-05">
        <div>This <code>flex-parent</code> is adjacent to another <code>flex-parent</code> and should not have any margin-top.</div>
    </div>
    <div class="bx success-light pxy-05">
        <div>This <code>box</code> is adjacent to a <code>flex-parent</code> and should have the default <code>top-margin</code></div>
    </div>
    <div class="flex success-light pxy-05">
        <div>This <code>flex-parent</code> is adjacent to a <code>box</code> and should have the default <code>top-margin</code></div>
    </div>
    <div class="grid danger-light pxy-05">
        <div>This <code>grid-parent</code> is adjacent to a <code>flex-parent</code> and should not have any margin-top.</div>
    </div>
</div>

<hr>

`.flex` or `.grid` + `section`

<div class="bdr bdr-blue pxy-025">
    <section class="danger-light pxy-05">
        <div>This <code>section</code> is a <code>first-child</code> and should not have any margin-top.</div>
    </section>
    <div class="flex danger-light pxy-05">
        <div>This <code>flex-parent</code> is adjacent <code>section</code> and should not have any margin-top.</div>
    </div>

    <section class="danger-light pxy-05">
        <div>This <code>section</code> is adjacent to a <code>flex-parent</code> and should not have any margin-top.</div>
    </section>

</div>


<a id="box-component-combinations"></a>
## Box Component Combinations

`.bx + .bx`
<div class="bdr bdr-red pxy-025">
    <div class="bx pxy-05">This <code>box</code> is a <code>first-child</code> and should not have any margin-top.</div>
    <div class="bx pxy-05">This <code>box</code> is adjacent to a <code>box</code> and has the default <code>$content-gap</code></div>
    <div class="bx pxy-05 mt-05">This <code>box</code> is adjacent to a <code>box</code> and has a <span class="txt-green">utility margin</span>.</div>
    <p>This <code>paragraph</code> and has the default <code>$content-gap</code></p>
    <div class="bx pxy-05">This <code>box</code> is adjacent to a <code>paragraph</code> and has the default <code>$content-gap</code></div>
    <div class="bx pxy-05 mt-05">This <code>paragraph</code> is adjacent to a <code>box</code> and has and has a <span class="txt-green">utility margin</span>.</div>
</div>


---

OLD TO REVIEW



<a id="box-component-with-flex-and-grid"></a>
### Box Component with Flex and Grid

`.bx + .bx` in `flex`
<div class="bdr bdr-red pxy-025 flex gg">
    <div class="bx pxy-05">These boxes are in a <code>flex</code> container and should not have any margins.</div>
    <div class="bx pxy-05">These boxes are in a <code>flex</code> container and should not have any margins.</div>
</div>

<div class="bdr bdr-red pxy-025 grid cols-2">
    <div class="bx pxy-05">These boxes are in a <code>grid</code> container and should not have any margins.</div>
    <div class="bx pxy-05">These boxes are in a <code>grid</code> container and should not have any margins.</div>
</div>


<div class="bdr bdr-red pxy-025 grid cols-2">
    <div class="bx pxy-05">
        <div class="bx-title">Box Title</div>
        <div class="bx-content">
            This <code>box-content</code> has the default <code>$content-gap</code>
        </div>
    </div>
    <div class="bx pxy-05">
        <div class="bx-title">Box Title</div>
        <div class="bx-content mt-05">
            This <code>box-content</code> has a <span class="txt-green">utility margin</span>.</div>
    </div>
</div>



<a id="paragraph-spacing-examples"></a>
### Paragraph Spacing Examples
<div class="bx pxy-025 bdr-orange">
    <p>This <code>paragraph</code> is a <code>first-child</code> and should not have any margin-top.</p>
    <p>This <code>paragraph</code> and has the default <code>$content-gap</code></p>
    <p class="mt-025">This <code>paragraph</code> has a <code><span class="txt-green">utility margin</span></code> and should override the default margin.</p>
</div>

<div class="bx pxy-025 bdr-orange">
    <p class="mt-3">This <code>paragraph</code> is a <code>first-child</code> with a <code><span class="txt-green">utility margin</span></code> and should override default spacing.</p>
    <p>This <code>paragraph</code> and has the default <code>$content-gap</code></p>
    <div class="bx">This <code>box</code> is adjacent to a <code>paragraph</code> and should have the default margin</div>
</div>

<a id="form-row-spacing"></a>
### Form Row Spacing

`.frm-row + .frm-row`
<div class="bx pxy-025 bdr-orange">
    <div class="frm-row"><input type="text"></div>
    <div class="frm-row mt-05"><input type="text"></div>
    <div class="frm-row"><input type="text"></div>
</div>


<a id="class-override-testing"></a>
## Class Override Testing

<a id="margin-and-padding"></a>
### Margin and Padding


For easier overriding utility class should NOT use shorthand properties

<div class="blue pxy-5">Parent Class <code>pxy</code> (all directions)</div>
<div class="blue pxy-5 py-1">Override the <code>y</code> axis from <code>xy</code></div>
<div class="blue pxy-5 py-1 px-3">Override the <code>x</code> and <code>y</code> axis</div>
<div class="blue pxy-5 py-1 px-3 pl-1">Override the <code>x</code> and <code>y</code> axis</div>

    <div class="blue pxy-5">Parent Class <code>pxy</code> (all directions)</div>
    <div class="blue pxy-5 py-1">Override the <code>y</code> axis from <code>xy</code></div>
    <div class="blue pxy-5 py-1 px-3">Override the <code>x</code> and <code>y</code> axis</div>
    <div class="blue pxy-5 py-1 px-3 pl-1">Override the <code>x</code> and <code>y</code> axis</div>

<a id="overriding-magic-classes"></a>
### Overriding Magic Classes


<div class="c-py-5-3-2">

    <div class="blue py-1"></div>
    <div class="blue"></div>
    <div class="blue"></div>
</div>

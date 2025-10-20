# Spacing and Layout Visual Testing

## Introduction

This page showcases the spacing rules set in `content_gap.scss`. Adjacent
block-level elements are given uniform top margins, while flex and grid
containers rely on gap properties for separation. Refer to this guide to check
spacing consistency and spot any anomalies.

## Heading Spacing

Gap before headings uses `em` units—larger headings get larger top gaps. Gap
after headings is consistent regardless of size.

<div class="flex justify-between items-end txt-sm">
    <div class="bdr-pink bdr-2 bg-stripes-pink">
        <h1 class="light">Heading 1</h1>
        <p class="light">Content after ...</p>
    </div>
    <div class="bdr-pink bdr-2 bg-stripes-pink">
        <p class="light">Content before ...</p>
        <h2 class="light">Heading 2</h2>
        <p class="light">Content after ...</p>
    </div>
    <div class="bdr-pink bdr-2 bg-stripes-pink">
        <p class="light">Content before ...</p>
        <h3 class="light">Heading 3</h3>
        <p class="light">Content after ...</p>
    </div>
    <div class="bdr-pink bdr-2 bg-stripes-pink">
        <p class="light">Content before ...</p>
        <h4 class="light">Heading 4</h4>
        <p class="light">Content after ...</p>
    </div>
    <div class="bdr-pink bdr-2 bg-stripes-pink">
        <p class="light">Content before ...</p>
        <h5 class="light">Heading 5</h5>
        <p class="light">Content after ...</p>
    </div>
    <div class="bdr-pink bdr-2 bg-stripes-pink">
        <p class="light">Content before ...</p>
        <h6 class="light">Heading 6</h6>
        <p class="light">Content after ...</p>
    </div>
</div>

## Adjacent Elements

Adjacent elements receive automatic `margin-top` based on `$content-gap` (set in
`variables/_base.scss`). Override with utility classes when needed.

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
        <h4>With utility overrides</h4>
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

<!-- <div class="blue pxy-075 my-025 flex">Flex parent</div>
<svg class="pink pxy-075 w-full h-3"> <text  y="1em" fill="white">SVG element</text> </svg>
<svg class="pink pxy-075 w-full h-3"> <text  y="1em" fill="white">SVG element</text> </svg>
<button class="flex gap-075 outline outline-dashed outline-2 h-2">
    <div class="w-4 bdr-2 bdr-pink bg-stripes-pink"></div>
    <div class="w-16 bdr-2 bdr-pink bg-stripes-pink"></div>
</button> -->

## Flex or Grid Parent

Elements inside `flex` or `grid` parents have `margin-top: 0`. Use `gap` classes
for spacing.

## Testing Combinations

All elements below should have consistent spacing. Inconsistent spacing
indicates an issue in `content_gap.scss`.

<div class="bx bg-stripes-pink">
    <div class="flex pxy warning-light rounded-05">Flex parent</div>
    <div class="grid pxy warning-light rounded-05">Grid parent</div>
    <div class="bx pxy warning-light rounded-05">Box element</div>
    <div class="frm-row pxy warning-light rounded-05">Form row</div>
    <p class="frm-row pxy warning-light rounded-05">Paragraph element</p>
    <form class="pxy warning-light rounded-05">Form element</form>
    <table class="pxy warning-light rounded-05"><tr><th>Table element</th></tr></table>
    <ul class="pxy warning-light rounded-05">ul element</ul>
    <input type="text" placeholder="Input (control only)" class="w-full">
</div>
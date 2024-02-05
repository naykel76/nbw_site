
# Combinators

<!-- TOC -->

- [Quick Reference](#quick-reference)
- [Child combinator (\>)](#child-combinator-)
- [Adjacent sibling combinator (+)](#adjacent-sibling-combinator-)
- [General sibling combinator (~)](#general-sibling-combinator-)
- [Other Combinators](#other-combinators)
    - [Exclude first:child](#exclude-firstchild)

<!-- /TOC -->

<a id="markdown-quick-reference" name="quick-reference"></a>

## Quick Reference


| Combinator Name  | Symbol | Description                |  Example  |
| ---------------- | :----: | -------------------------- | :-------: |
| Child            |   >    | Selects direct children    | `div > p` |
| Adjacent sibling |   +    | Selects immediate siblings | `div + p` |
| General sibling  |   ~    | Selects all siblings       | `div ~ p` |

<a id="markdown-child-combinator-" name="child-combinator-"></a>

## Child combinator (>)

The child combinator (>) is used to select elements that are direct children of a specified element.

```css
div > * { } /* Select any element where the parent is a <div> element */
div > p { } /* Selects all <p> elements where the parent is a <div> element */
```

<div>
    <style>
        div.child-combinator > p {
            color: red;
        }
    </style>
    <div class="bdr pxy rounded-1 child-combinator">
        <p>Paragraph is direct child and will be styled</p>
        <div>
            <p>This paragraph is not a direct child it is nested inside another <code>div</code></p>
        </div>
    </div>
</div>


<a id="markdown-adjacent-sibling-combinator-" name="adjacent-sibling-combinator-"></a>

## Adjacent sibling combinator (+)

The adjacent sibling combinator (+) is used to select elements that are placed immediately after (not inside) the first specified element.

```css
div + p { } /* Selects all <p> elements that are placed immediately after <div> elements */
```

Adjacent is directly after,

```html
<div>...</div>
<p> Pick me! </p>
```

Not nested.

```html
<!-- not adjacent -->
<div>
    <p> Not me, I'm nested!</p>
</div>
```

<a id="markdown-general-sibling-combinator-" name="general-sibling-combinator-"></a>

## General sibling combinator (~)

The general sibling combinator (~) is similar to the adjacent sibling combinator. The difference
is that that the element being selected doesn’t need to immediately succeed the first element, but
can appear anywhere after it.

```css
div ~ p { } /* Selects all <p> elements that follow <div> elements */
```

```html
<div>...</div>
<p> Pick me! </p>
<section>...</section>
<p> Pick me! </p>
```

## Other Combinators

### Exclude first:child

This selector is good for adding properties such as `border-top` or `margin-top` as the property does not apply to the first-child

```css
.not-first-child > :not([hidden]) ~ :not([hidden]) { }
```

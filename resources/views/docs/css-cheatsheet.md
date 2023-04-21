# CSS Cheatsheet

<!-- MarkdownTOC -->

- [Pseudo-Classes](#pseudo-classes)
- [Selectors](#selectors)
- [Setting Widths](#setting-widths)
        - [How do I make one flex-item 100%](#how-do-i-make-one-flex-item-100)
- [Typography](#typography)
    - [Responsive Type](#responsive-type)
- [Combinators](#combinators)
    - [Child Selectors](#child-selectors)
        - [Exclude first:child](#exclude-firstchild)
    - [Adjacent Sibling Combinator `+`](#adjacent-sibling-combinator-)
    - [General Sibling Combinator `~`](#general-sibling-combinator-)
- [Box Shadow](#box-shadow)
- [Transition](#transition)
    - [Transition element from left to right](#transition-element-from-left-to-right)

<!-- /MarkdownTOC -->

## Pseudo-Classes

```css
h1 { color: blue; }

h1 { color: blue; }

```

`:where` does not have any specificity, is a specificity killer.

Anything inside the where get zero specificity making it easier to override

```css
/* old way */
.class h1, .class h2 { }
/*  */
.class :is(h1, h2)
/*  */
a :is(:hover, :focus){}
```

`:has()` is like a parent selector. The following example is saying, if `my_class` has an image then select `my_class`

```css
.my_class:has(img) { }
```


<a id="selectors"></a>
## Selectors

https://www.w3schools.com/cssref/css_selectors.asp

| Selector           | Example              | Description                                                                             |
| ------------------ | -------------------- | --------------------------------------------------------------------------------------- |
| [attribute]        | [target]             | Selects all elements with a target attribute                                            |
| [attribute=value]  | [target="_blank"]    | Selects all elements with target="_blank"                                               |
| [attribute~=value] | [title~="flower"]    | Selects all elements with a title attribute containing the word "flower"                |
| [attribute^=value] | a[href^="https"]     | Selects every <a> element whose href attribute value begins with "https"                |
| [attribute$=value] | a[href$=".pdf"]      | Selects every <a> element whose href attribute value ends with ".pdf"                   |
| [attribute*=value] | a[href*="w3schools"] | Selects every <a> element whose href attribute value contains the substring "w3schools" |




<a id="setting-widths"></a>
## Setting Widths

Set a min and max width using clamp

```css
`min(100px, 70%)`   // picks the smallest size of the two
`max()`             // picks the largest size of the two
`clamp()`           // min, max, ideal size
```



<a id="how-do-i-make-one-flex-item-100"></a>
#### How do I make one flex-item 100%

flex-basis is the initial starting width before flex-grow or flex shrink is applied

<a id="typography"></a>
## Typography

Create CSS font size variables in the `:root` element so the can easily be overridden.

    :root{
        --fs-xl: 5rem;
    }

        <div class="danger bx">

<a id="responsive-type"></a>
### Responsive Type


use clamp to specify a minimum and maximum text size

<a id="combinators"></a>
## Combinators


<a id="child-selectors"></a>
### Child Selectors

The child selector selects all elements that are the children of a specified element.

```css
div > * { } /* Select any element where the parent is a <div> element */
div > p { } /* Selects all <p> elements where the parent is a <div> element */
```

<a id="exclude-firstchild"></a>
#### Exclude first:child

This selector is good for adding properties such as `border-top` or `margin-top` as the property does not apply to the first-child

```css
.not-first-child > :not([hidden]) ~ :not([hidden]) { }
```

<a id="adjacent-sibling-combinator-"></a>
### Adjacent Sibling Combinator `+`

Allows you to select an element that is placed immediately after another element.

    p + p { } /* Selects all paragraphs that follow another paragraph */


<a id="general-sibling-combinator-~"></a>
### General Sibling Combinator `~`

The general sibling combinator is similar to the adjacent sibling combinator. The difference is that that the element being selected doesn’t need to immediately succeed the first element, but can appear anywhere after it.


```css
.abc ~ .xyz { color: red; } /* Select every .xyz class that follows the .abc class */
```

```html
<div class="abc"> ... </div>
<div class="xyz"> Pick Me! </div>
<div class="abc">
    <div class="xyz"> ... </div>
</div>
```



<a id="box-shadow"></a>
## Box Shadow

box-shadow: `horizontal-offset` `vertical-offset` `blur-size` `spread` `color`

- The spread means take the offset, then start the blur
- color can be set to `currentColor` to match the element `color` property
- can add (inset) at the beginning for internal shadow

    box-shadow: 10px 10px 5px black;

it's possible to add multiple shadows

    box-shadow: 0 10px 25px black, 0 20px 25px red, 0 30px 25px green;


<a id="transition"></a>
## Transition

https://developer.mozilla.org/en-US/docs/Web/CSS/transition-timing-function

```css
transition: [property] [duration] [timing-function] [delay];
transition-property:
transition-delay:
transition-duration:
transition-timing-function: [ease|linear|ease-in|ease-out|ease-in-out|step-start|step-end]
```

<style>
.bx.example1 { transition: background-color 0.2s ease, padding 0.8s linear; }
.bx.example1:hover { background-color: pink; padding: 2rem; }
</style>

<div class="bx example1"> Hover over me! </div>

You can specify a particular property, use a value of `all`, or use a comma separate value sets to do different transitions on different properties:

```css
/* single property */
.element { transition: background-color 1s ease-in; }
/* all transitions */
.element { transition: all 1s ease-in; }
/* selected properties */
.element { transition: background 0.2s ease, padding 0.8s linear; }

.element:hover { background-color: blue; padding: 3rem; }
```

### Transition element from left to right

<style>
.bx.example2 { background: hsl(200, 100%, 20%0;) }
.child { width: 300px; transition: all 2s cubic-bezier(0.4, 0, 0.2, 1); }
.bx.example2:hover .child {  transform: translateX(100%); }
</style>


```css
.bx.example2 { background: hsl(200, 100%, 20%0;) }
.child { width: 300px; transition: all 2s; }
.bx.example2:hover .child {  transform: translateX(100%); }
```

<div class="bx example2 flex">
    <div class="child"> Hover over the parent to see me slide! </div>
</div>



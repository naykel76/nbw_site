# CSS Cheatsheet

<!-- MarkdownTOC -->

- [Pseudo-Classes](#pseudo-classes)
- [Selectors](#selectors)
- [Setting Widths](#setting-widths)
        - [How do I make one flex-item 100%](#how-do-i-make-one-flex-item-100)
- [Box Shadow](#box-shadow)

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



<a id="box-shadow"></a>
## Box Shadow

box-shadow: `horizontal-offset` `vertical-offset` `blur-size` `spread` `color`

- The spread means take the offset, then start the blur
- color can be set to `currentColor` to match the element `color` property
- can add (inset) at the beginning for internal shadow

    box-shadow: 10px 10px 5px black;

it's possible to add multiple shadows

    box-shadow: 0 10px 25px black, 0 20px 25px red, 0 30px 25px green;



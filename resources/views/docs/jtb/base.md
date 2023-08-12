# Base Styles

<!-- TOC -->

- [Overview](#overview)
- [Headings](#headings)
- [Lists](#lists)
- [Tables](#tables)
- [Spacing](#spacing)

<!-- /TOC -->

<a id="markdown-overview" name="overview"></a>

## Overview

JTB provides sensible base defaults as a starting point, easily customizable with utility classes.
It occasionally incorporates slight opinions, such as applying a small margin to list items,
except for `:first-child` and `nav li` elements. This approach ensures consistent spacing
throughout the design while allowing flexibility for further customization.

    :is(li:not(:first-child):not(nav li))

<a id="markdown-headings" name="headings"></a>

## Headings

By default, the headings have styles aimed to provide a clear hierarchical structure to the
content allowing users to quickly scan and understand the organization of information. By keeping
headings visually prominent, you can reinforce this structure and guide users to key sections or
subsections of the content.

De-emphasizing headings can be achieved simply by adding utility classes, or you can override the
base styles if you would like to take a more global approach.

```scss
// base styles
$heading-sizes: 2.25em, 1.75em, 1.5em, 1.25em, 1.125em, 1em !default;
$heading-color: inherit !default;
$heading-font-weight: 700;
```

```scss
// de-emphasizing font-size
$heading-sizes: inherit, inherit, inherit, inherit, inherit, inherit !default;
```

<a id="markdown-lists" name="lists"></a>

## Lists

Lists are typically styled with bullets or numbers by default, which has both advantages and
disadvantages. The assumption is that lists without bullets or numbering can be easily removed in
a practical class or element. For example, `nav ul` has `list-style: none` in the `base.scss`
file. This simplifies list creation in documents and WYSIWYG editors, where users expect bullets
or numbers without the need for additional workarounds to add them.


<div class="flex">
    <div>
        <ul class="w-10">
            <li>One</li>
            <li>Two</li>
            <li>Three</li>
        </ul>
    </div>
    <div>
        <ol class="w-10">
            <li>One</li>
            <li>Two</li>
            <li>Three</li>
        </ol>
    </div>
    <nav>
        <ul class="w-10">
            <li>Nav Item One</li>
            <li>Nav Item Two</li>
            <li>Nav Item Three</li>
        </ul>
    </nav>
</div>

<a id="markdown-tables" name="tables"></a>

## Tables

| Table Header | Table Header | Table Header |
| ------------ | ------------ | ------------ |
| Table Data   | Table Data   | Table Data   |
| Table Data   | Table Data   | Table Data   |
| Table Data   | Table Data   | Table Data   |

<a id="markdown-spacing" name="spacing"></a>

## Spacing

Default `margin` and `padding` has been removed from all elements to make it easier op-in.



# Navbar

<p class="lead">Basic container with opinionated layout for horizontal menus.</p>

<!-- The navbar component can be used to show a list of navigation links positioned on the top side of your page based on multiple layouts, sizes, and dropdowns -->

<!-- TOC -->

- [Overview](#overview)
- [Base structure](#base-structure)
- [Styling and Variables](#styling-and-variables)
    - [`nav-item`](#nav-item)
- [Parent Items](#parent-items)
    - [CSS Only](#css-only)
    - [Alpine Hover](#alpine-hover)
    - [Alpine click](#alpine-click)

<!-- /TOC -->

<a id="markdown-overview" name="overview"></a>

## Overview

The `navbar` class is a basic container that applies foundational styles for
managing the layout of horizontal menus. It serves as a helpful starting
point, preventing the need for excessive utility classes and keeping your code
clean.

<a id="markdown-base-structure" name="base-structure"></a>

## Base structure

Use the following markup structure for improved SEO and accessibility. This
semantic approach requires minimal styling effort while effectively
communicating the website's structure to search engines and enhancing
accessibility for users with assistive technologies.

<div class="navbar dark px-0">
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</div>

```html
<div class="navbar">
    <nav>
        <ul>
            <li> <a href=""> </a> </li>
        </ul>
    </nav>
</div>
```



Beyond the basic markup you are working with a blank slate and you are free to
add additional elements such as logos or search bars.

<a id="markdown-styling-and-variables" name="styling-and-variables"></a>

## Styling and Variables

You have two methods available for styling the navbar. The first option is to use utility classes,
while the second option involves modifying the `$navbar-*` SCSS variables.

<div class="bx warning flex">
    <svg class="icon wh-3 fs0 mr-2">
        <use xlink:href="/svg/naykel-ui.svg#warning-round"></use>
    </svg>
    <div>Navbar variables are only effective when there is a background color set so it is best not to set transparent</div>
</div>


<a id="markdown-nav-item" name="nav-item"></a>

### `nav-item`

For more opinionated styles on the navigation items you can add the `nav-item` class.

<div class="navbar dark">
    <nav>
        <ul>
            <li><a class="nav-item" href="#">Home</a></li>
            <li><a class="nav-item" href="#">Services</a></li>
            <li><a class="nav-item" href="#">About</a></li>
            <li><a class="nav-item" href="#">Contact</a></li>
        </ul>
    </nav>
</div>

```html
<div class="navbar">
    <nav>
        <ul>
            <li><a class="nav-item" href="#"></a></li>
        </ul>
    </nav>
</div>
```

<a id="markdown-parent-items" name="parent-items"></a>

## Parent Items

<div class="bx purple flex">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#search"></use></svg>
    <div>
    <div class="bx-title">NEED TO REVIEW</div>
    Currently, You may need apply a theme class to the menu to switch between light and dark themes. In the future consider adding the functionality to switch automatically or override.
    </div>
</div>

<a id="markdown-css-only" name="css-only"></a>

### CSS Only

To create a CSS dropdown, use the `dd` dropdown class on the nav item and include the `dd-content` wrapper.

<div class="navbar ha-l dark">
    <nav>
        <ul>
            <li class="nav-item dd">
                <a href="#">
                    Parent (css)
                    <svg class="icon sm"> <use xlink:href="/svg/naykel-ui.svg#caret-down"></use> </svg>
                </a>
                <div class="dd-content mt-05">
                    <ul class="menu dark bx pxy-0">
                        <li><a href="#">Child</a></li>
                        <li><a href="#">Child</a></li>
                        <li><a href="#">Child</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>

```html
<li class="nav-item dd">
    <a href="#">
        Parent (css)
        <svg class="icon sm"> <use xlink:href="/svg/naykel-ui.svg#caret-down"></use> </svg>
    </a>
    <div class="dd-content mt-05">
        <ul class="menu bx pxy-0">
            <li><a href="#"></a></li>
        </ul>
    </div>
</li>
```

<a id="markdown-alpine-hover" name="alpine-hover"></a>

### Alpine Hover

<div class="navbar ha-l dark">
    <nav>
        <ul>
            <li class="relative" x-data="{showChildren:false}"
                x-on:mouseenter="showChildren=true" x-on:mouseleave="showChildren=false">
                <a href="#">
                    Parent (alpine hover)
                    <svg class="icon sm"> <use xlink:href="/svg/naykel-ui.svg#caret-down"></use> </svg>
                </a>
                <div class="absolute mt-05 flex w-10 z-100" x-show="showChildren" x-transition.duration style="display: none;">
                    <ul class="menu stone bx pxy-0 w-full">
                        <li><a href="#">Child</a></li>
                        <li><a href="#">Child</a></li>
                        <li><a href="#">Child</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>

```html
<li class="relative" x-data="{showChildren:false}"
    x-on:mouseenter="showChildren=true" x-on:mouseleave="showChildren=false">
    <a href="#">
        Parent (alpine hover)
        <svg class="icon sm"> <use xlink:href="/svg/naykel-ui.svg#caret-down"></use> </svg>
    </a>
    <div class="absolute mt-05 flex w-10 z-100" x-show="showChildren" x-transition.duration style="display: none;">
        <ul class="menu bx pxy-0 w-full">
            <li><a href="#"></a></li>
        </ul>
    </div>
</li>
```

<a id="markdown-alpine-click" name="alpine-click"></a>

### Alpine click

<div class="navbar ha-l dark">
    <nav>
        <ul>
            <li class="relative" x-data="{showChildren:false}" x-on:click.away="showChildren=false">
                <a href="#" x-on:click.prevent="showChildren=!showChildren">
                    Parent (alpine click)
                    <svg class="icon sm"> <use xlink:href="/svg/naykel-ui.svg#caret-down"></use> </svg>
                </a>
                <div class="absolute mt-05 flex w-10 z-100" x-show="showChildren" x-transition.duration style="display: none;">
                    <ul class="menu rose bx pxy-0 w-full">
                        <li><a href="#">Child</a></li>
                        <li><a href="#">Child</a></li>
                        <li><a href="#">Child</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>


```html
<li class="relative" x-data="{showChildren:false}" x-on:click.away="showChildren=false">
    <a href="#" x-on:click.prevent="showChildren=!showChildren">
        Parent (alpine click)
        <svg class="icon sm"> <use xlink:href="/svg/naykel-ui.svg#caret-down"></use> </svg>
    </a>
    <div class="absolute mt-05 flex w-10 z-100" x-show="showChildren" x-transition.duration style="display: none;">
        <ul class="menu bx pxy-0 w-full">
            <li><a href="#"> </a></li>
        </ul>
    </div>
</li>
```

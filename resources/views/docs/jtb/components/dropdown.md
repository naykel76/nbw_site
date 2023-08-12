# Dropdown

<!-- MarkdownTOC -->

- [Introduction](#introduction)
- [Content Position](#content-position)
- [Buttons with Dropdowns](#buttons-with-dropdowns)
- [Examples](#examples)
    - [Account dropdown with navigation](#account-dropdown-with-navigation)
    - [Dropdown Button with Links](#dropdown-button-with-links)

<!-- /MarkdownTOC -->

<div class="bx danger">
    Dropdown currently only supports the hover action.
</div>

<a id="introduction"></a>
## Introduction

The dropdown component is simple concept where you hover over an element with the `dd` class which will set the visibility of the `dd-content`.

- `dd` - is the toggle which can be applied to basically any element.
- `dd-content` - is a wrapper to place the dropdown content.

By default the `dd-content` element has limited styling applied giving you the freedom to use utility classes. One of the easiest ways to add style is to add the `bx` class direct to the `dd-content` element.


<div class="flex space-x">
    <div class="dd">
        <button>Button Hover</button>
        <div class="dd-content bx pxy-1">
            <p>Dropdown Content</p>
        </div>
    </div>

    <div class="dd">
        <a href="">Link Hover</a>
        <div class="dd-content bx pxy-1">
            <p>Dropdown Content</p>
        </div>
    </div>
    <div class="dd">
        Text Hover
        <div class="dd-content bx pxy-1">
            <p>Dropdown Content</p>
        </div>
    </div>
</div>

```html
<div class="dd">
    <div>
        <!-- Toggle Element -->
    </div>
    <div class="dd-content bx pxy-1">
        <!-- Dropdown Content -->
    </div>
</div>
```

<a id="content-position"></a>
## Content Position

By default the dropdown content aligns to the left main dropdown toggle, you can align to the right by adding the `pos-r` position utility classes.

**NOTE** Currently only supports left and right positioning (`pos-l` and `pos-r`)

<div class="flex gg">
    <div class="dd">
        <div class="btn">
            Mouse me (POS-L)
        </div>
        <div class="dd-content bx pxy-1 pos-r">
            <p>Dropdown Content</p>
        </div>
    </div>
    <div class="dd">
        <div class="btn">
            Mouse me (POS-R)
        </div>
        <div class="dd-content bx pxy-1">
            <p>Dropdown Content</p>
        </div>
    </div>
</div>


<a id="buttons-with-dropdowns"></a>
## Buttons with Dropdowns

<div class="flex pxy bdr space-x">
    <!-- icon-button with theme, state and dropdown -->
    <div class="dd icon-button secondary withState">
        <svg class="icon">
            <use xlink:href="/svg/naykel-ui.svg#user"></use>
        </svg>
        <div class="mt-025 lh-1">Login</div>
        <div class="dd-content bx pos-r">
            dropdown content
        </div>
    </div>
    <!-- icon-button with theme, state and dropdown -->
    <div class="dd btn secondary flex-col pxy-1 px-1.5">
        <svg class="wh-1.5">
            <use xlink:href="/svg/naykel-ui.svg#user"></use>
        </svg>
        <div class="mt-025 lh-1">Login</div>
        <div class="dd-content bx tal">
            dropdown content
        </div>
    </div>
</div>

```html
<!-- icon-button class with theme, state and dropdown -->
<div class="dd icon-button secondary withState">
    <svg class="icon">
        <use xlink:href="/svg/naykel-ui.svg#user"></use>
    </svg>
    <div class="mt-025 lh-1">Login</div>
    <div class="dd-content bx pos-r">
        dropdown content
    </div>
</div>
```

```html
<!-- btn class with theme, state and dropdown -->
<div class="dd btn secondary flex-col pxy-1 px-1.5">
    <svg class="wh-1.5">
        <use xlink:href="/svg/naykel-ui.svg#user"></use>
    </svg>
    <div class="mt-025 lh-1">Login</div>
    <div class="dd-content bx tal">
        dropdown content
    </div>
</div>
```

<a id="examples"></a>
## Examples

<a id="account-dropdown-with-navigation"></a>
### Account dropdown with navigation

<div class="dd cursor-pointer btn tal">
    <div class="flex va-c">
        <img class="wh-2 round" src="https://ui-avatars.com/api/?name=Jimmy+Peters&color=7F9CF5&background=EBF4FF" alt="Profile Photo">
        <div class="ml-075">
            <span>Jimmy Peters</span>
            <svg class="icon sm">
                <use href="/svg/naykel-ui.svg#caret-down"></use>
            </svg>
        </div>
    </div>
    <div class="dd-content bx pxy-0">
        <nav class="menu">
        <a href="">Nav Item</a>
        <a href="">Nav Item</a>
        <a href="">Nav Item</a>
        </nav>
    </div>
</div>

---

### Dropdown Button with Links

<div class="flex space-x">
    <div class="dd inline-flex">
        <div class="btn">
            Dropdown Position Left
            <svg class="icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
        <div class="dd-content bx flex-col pxy-05">
            <a href="" class="dd-item">Dashboard</a>
            <a href="" class="dd-item">Profile</a>
            <a href="" class="dd-item">Account Security</a>
            <a href="" class="dd-item">Documentation</a>
        </div>
    </div>
    <div class="dd">
        <div class="btn">
            Dropdown Position Right
            <svg class="icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
        <div class="dd-content bx pos-r flex-col pxy-05">
            <a href="">Dashboard</a>
            <a href="">Profile</a>
            <a href="">Account Security</a>
            <a href="">Documentation</a>
        </div>
    </div>
</div>

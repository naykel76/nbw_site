# Hover Dropdown

- [CSS Dropdown](#css-dropdown)
- [Dropdown Content Position](#dropdown-content-position)
- [Examples](#examples)
  - [Dropdown Button with Links](#dropdown-button-with-links)
- [Alpine Dropdown (TBD)](#alpine-dropdown-tbd)



## CSS Dropdown

The CSS dropdown is a straightforward dropdown activated when the toggle element is hovered over.

<div class="flex items-center space-x">
    <div class="dd">
        <button class="btn primary">Hover Toggle</button>
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

The toggle element can be any element of your choice, provided you apply the `dd` class, and it has
a sibling element with the `dd-content` class that holds the dropdown content. Here is the
fundamental structure of the dropdown.

```html
<div class="dd">
    <div>
        <!-- Toggle Element -->
    </div>

    <div class="dd-content"> 
        <!-- Dropdown Content -->
    </div>
</div>
```
## Dropdown Content Position

By default the dropdown content aligns to the left main dropdown toggle, you can align to the right
by adding the `right-0` position utility classes.

**NOTE** Currently only supports left and right positioning (`left-0` and `right-0`)

<div class="flex gap">
    <div class="dd">
        <div class="btn">
            Mouse me (left-0)
        </div>
        <div class="dd-content bx pxy-1 right-0">
            <p>Dropdown Content</p>
        </div>
    </div>
    <div class="dd">
        <div class="btn">
            Mouse me (right-0)
        </div>
        <div class="dd-content bx pxy-1">
            <p>Dropdown Content</p>
        </div>
    </div>
</div>


## Examples

<button class="dd btn primary mb">
    <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#user"></use> </svg>
    <div class="ml-025 lh-1">Login</div>
    <div class="dd-content bx">
        dropdown content
    </div>
</button>

```html
<button class="dd btn primary">
    <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#user"></use> </svg>
    <div class="ml-025 lh-1">Login</div>
    <div class="dd-content bx">
        dropdown content
    </div>
</button>
```




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
        <div class="dd-content bx right-0 flex-col pxy-05">
            <a href="">Dashboard</a>
            <a href="">Profile</a>
            <a href="">Account Security</a>
            <a href="">Documentation</a>
        </div>
    </div>
</div>



## Alpine Dropdown (TBD)

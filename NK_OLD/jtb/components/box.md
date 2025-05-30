# Box Component

<p class="lead">Box component that offers a versatile structure for creating customised boxes for a range of components.</p>

- [Box Component](#box-component-1)
- [Things to Know](#things-to-know)
- [Apply Themes](#apply-themes)
- [Examples](#examples)
        - [Lists and Navigation](#lists-and-navigation)


## Box Component

The Box Component consists of three primary elements: `bx-header`, `bx-content`, and `bx-footer`.
These elements form the core structure, allowing developers to create customised boxes for various
applications, such as cards, alerts, and notifications.

With the flexibility to use any combination of these elements, the Box Component provides a
foundational layout for visually appealing and functional designs. Its adaptable structure allows
each component to be tailored to unique requirements while maintaining a cohesive design.

<div class="bx w-24">
    <div class="bx-header">
        <div class="bx-title">Box with Header and Footer</div>
    </div>
    <div class="bx-content">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, in illum. Id qui, doloribus consectetur ex nemo eum excepturi quos?</p>
    </div>
    <div class="bx-footer tar">
        <button class="btn primary outline">Cancel</button>
        <button class="btn primary">Save</button>
    </div>
</div>


```html
<div class="bx">
    <div class="bx-header">
        <div class="bx-title"> ... </div>
    </div>
    <div class="bx-content"> ... </div>
    <div class="bx-footer"> ... </div>
</div>
```

## Things to Know

- `overflow: hidden;` has been applied to the `.bx`,  class to prevent the image from overflowing the
  box when using a border-radius.

## Apply Themes

You can apply any theme or combine multiple themes to achieve the desired visual style and enhance
the overall aesthetics of the component.

<div class="grid cols-2">
    <div class="bx primary">
        <div class="bx-title">Primary Theme</div>
        <p>Lorem ipsum dolor, sit amet consectetur elit cow. Recusandae, aliquam?</p>
    </div>
    <div class="bx secondary">
        <div class="bx-title">Secondary Theme</div>
        <p>Lorem ipsum dolor, sit amet consectetur elit cow. Recusandae, aliquam?</p>
    </div>
    <div class="bx dark">
        <div class="bx-title">Dark Theme</div>
        <p>Lorem ipsum dolor, sit amet consectetur elit cow. Recusandae, aliquam?</p>
    </div>
    <div class="bx light">
        <div class="bx-title">Dark Theme</div>
        <p>Lorem ipsum dolor, sit amet consectetur elit cow. Recusandae, aliquam?</p>
    </div>
</div>

```html
<div class="bx primary">
    <div class="bx-title">...</div>
    <div class="bx-content"> ... </div>
</div>
```

## Examples

Remove the border and padding from the box header.

<div class="grid cols-2 tac">
    <div class="bx">
        <div class="bx-header bdr-0 pxy-0">
            <img src="/images/samples/sample001-600x338.jpg" alt="Naykel sample">
        </div>
        <div class="bx-content">
            <div class="bx-title">Designed for Active Life</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolor magna lorem ipsum dolor sit amet. Condimentum vitae sapien </p>
        </div>
    </div>
    <div class="bx">
        <div class="bx-header">
            <img src="/images/samples/sample003-600x338.jpg" alt="Naykel sample">
        </div>
        <div class="bx-content">
            <div class="bx-title">Your Journey Begins</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolor magna lorem ipsum dolor sit amet. Condimentum vitae sapien </p>
        </div>
    </div>
</div>

```html
<div class="bx">
    <div class="bx-header bdr-0 pxy-0"> ... </div>
    <div class="bx-content">
        <div class="bx-title"> ... </div>
        <p></p>
    </div>
</div>
```

--- 

Overlay text on an image.

How to make the overlay part transparent? You need to set the background color with an alpha value.


<div class="grid cols-2 tac">
    <div>
        <div class="bx">
            <div class="bx-header bdr-0 pxy-0 relative">
                <img src="/images/samples/sample001-600x338.jpg" alt="Naykel sample">
                <div class="pxy absolute pos-x pos-b" style="background-color: rgba(255,255,255, 0.9);">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                </div>
            </div>
            <div class="bx-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolor magna lorem ipsum dolor sit amet. Condimentum vitae sapien. </p>
            </div>
        </div>
    </div>
    <div>
        <div class="bx">
            <div class="bx-header bdr-0 pxy-0 relative">
                <img src="/images/samples/sample001-600x338.jpg" alt="Naykel sample">
                <div class="pxy absolute pos-x pos-b" style="background-color: rgba(255,255,255, 0.9);">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                </div>
            </div>
        </div>
    </div>
</div>


```html
<div class="bx">
    <div class="bx-header bdr-0 pxy-0"> ... </div>
    <div class="bx-content">
        <div class="bx-title"> ... </div>
        <p></p>
    </div>
</div>
```

---

<div class="grid cols-2 tac mt">
    <div>
        <img src="/images/samples/sample001-600x338.jpg" alt="Naykel sample">
        <div class="bx bdr-0">
            <div class="bx-title">Designed for Active Life</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolor magna lorem ipsum dolor sit amet. Condimentum vitae sapien </p>
        </div>
    </div>
    <div>
        <img src="/images/samples/sample003-600x338.jpg" alt="Naykel sample">
        <div class="bx bdr-0">
            <div class="bx-title">Your Journey Begins</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolor magna lorem ipsum dolor sit amet. Condimentum vitae sapien </p>
        </div>
    </div>
</div>


#### Lists and Navigation

Create a box with a header and content. The header should have a background color, and the content
will be a list. This essentially a navigation menu.

This works well when you are creating a simple list, but things can get complicated when you need to
add more complex elements like buttons, icons, or images. In such cases, you may need to create a
more complex structure with additional elements.

- Add the `pxy-0` class to the `.bx-content` element to remove the padding from the content area.
  This will allow the list to extend to the edges of the box. Like in example 3.

<div class="grid cols-3 va-t">
    <div class="bx">
        <div class="bx-header primary">
            <div class="bx-title">Box with List (1)</div>
        </div>
        <div class="bx-content bg-blue-100">
            <ul>
                <li>Home</li>
                <li>About</li>
                <li>Services</li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
    <div class="bx">
        <div class="bx-header primary">
            <div class="bx-title">Navigation (2)</div>
        </div>
        <div class="bx-content bg-blue-100">
            <ul class="menu">
                <li class="menu-item">Home</li>
                <li class="menu-item">About</li>
                <li class="menu-item">Services</li>
                <li class="menu-item">Contact</li>
            </ul>
        </div>
    </div>
    <div class="bx rounded-1">
        <div class="bx-header primary">
            <div class="bx-title">Navigation (3)</div>
        </div>
        <div class="bx-content bg-blue-100 pxy-0">
            <ul class="menu">
                <li class="menu-item">Home</li>
                <li class="menu-item">About</li>
                <li class="menu-item">Services</li>
                <li class="menu-item">Contact</li>
            </ul>
        </div>
    </div>
</div>

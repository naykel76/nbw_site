# Menu

<p class="lead">Basic menu class with navigation styles best suited for opinionated vertical, easily customizable via utility classes or class overrides.</p>

- [Base class](#base-class)
- [Menu Themes](#menu-themes)
- [Nested Menus](#nested-menus)

## Base class

The `menu` class works with `<nav>`, `<div>`, and `<ul>` elements.

When using a list inside the `nav` element, the `nav` element will be styled as a menu so make sure
to add the `menu` class to the `nav` element. The `menu-title` class is used to style the title of
the menu. The `menu-title` class is optional.

<div class="bx grid md:cols-3">
    <div class="menu">
        <div class="menu-title"><code>&lt;div class=&quot;menu&quot;&gt;</code></div>
        <a href="">Item</a>
        <a href="">Parent</a>
        <a href="" class="active">Active</a>
    </div>
    <nav class="menu">
        <div class="menu-title"><code>&lt;nav class=&quot;menu&quot;&gt;</code></div>
        <a href="">Item 
        <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#user"></use> </svg>
        </a>
        <a href="">Parent</a>
        <a href="" class="active">Active</a>
    </nav>
    <nav class="menu">
        <div class="menu-title"><code>&lt;nav class=&quot;menu&quot;&gt;</code></div>
        <a href="">Item</a>
        <a href="">Parent</a>
        <a href="" class="active">Active</a>
    </nav>
    <ul class="menu">
        <div class="menu-title"><code>&lt;ul class=&quot;menu&quot;&gt;</code></div>
        <li><a href="">Item</a></li>
        <li><a href="">Parent</a></li>
        <li><a href="" class="active">Active</a></li>
    </ul>
    <nav class="menu">
        <ul>
            <a href="/">Home</a>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>
</div>

```html
<nav class="menu">
    <div class="menu-title">...</div>
    <a href=""> ... </a>
    <a href="" class="active"> ... </a>
</nav>
```


## Menu Themes

You can apply a [theme class](/utilities/themes) to the parent element, or on the menu itself.

<div class="bx grid cols-3 dark">
    <div class="menu">
        <div class="menu-title">Company</div>
        <a href="#">About Us</a>
        <a href="#">Products</a>
        <a href="#">Pricing</a>
    </div>
    <nav class="menu">
        <div class="menu-title">Legal</div>
        <a href="#">Privacy</a>
        <a href="#">Security</a>
    </nav>
    <ul class="menu light pxy-05 rounded-05">
        <div class="menu-title">Contact</div>
        <li><a href="#">Book an appointment</a></li>
        <li><a href="#">Location</a></li>
        <li><a href="#">Contact Us</a></li>
    </ul>
</div>



## Nested Menus

<div class="grid cols-2">
    <nav class="menu">
        <div class="menu-header txt-blue txt-lg fw-7">nav > div > a</div>
        <div><a href="#">Home</a></div>
        <div>
            <a href="#"> Products </a>
            <div class="pl">
                <a href="#">Electronics</a>
                <a href="#">Clothing and Apparel</a>
                <a href="#">Beauty and Personal Care</a>
                <a href="#">Home Goods</a>
                <a href="#">Food and Beverages</a>
            </div>
        </div>
        <div>
            <a href="#"> Services </a>
            <div class="pl">
                <a href="#">Accounting and Bookkeeping</a>
                <a href="#">Web Design and Development</a>
                <a href="#">IT Support and Technology</a>
            </div>
        </div>
        <div><a href="#">About</a></div>
        <div><a href="#">Contact</a></div>
    </nav>
    <ul class="menu">
        <div class="menu-header txt-blue txt-lg fw-7">ul > li > a</div>
        <li><a href="#">Home</a></li>
        <li>
            <a href="#"> Products </a>
            <ul class="pl">
                <li><a href="#">Electronics</a></li>
                <li><a href="#">Clothing and Apparel</a></li>
                <li><a href="#">Beauty and Personal Care</a></li>
                <li><a href="#">Home Goods</a></li>
                <li><a href="#">Food and Beverages</a></li>
            </ul>
        </li>
        <li>
            <a href="#"> Services </a>
            <ul class="pl">
                <li><a href="#">Accounting and Bookkeeping</a></li>
                <li><a href="#">Web Design and Development</a></li>
                <li><a href="#">IT Support and Technology</a></li>
            </ul>
        </li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</div>

```html
<nav class="menu">
    <div>
        <a href="#"> Item </a>
    </div>
    <div>
        <a href="#"> Parent </a>
        <div class="pl">
            <a href="#">Child</a>
        </div>
    </div>
</nav>
```

Nested menu using ordered list

```html
<ul class="menu">
    <li>
        <a href="#"> Item </a>
    </li>
    <li>
        <a href="#"> Parent </a>
        <ul class="pl">
            <li><a href="#">Child</a></li>
        </ul>
    </li>
</ul>
```

# Lists

## Icon Lists

There are 2 ways to create an icon list. The first method is to create your list and apply the `icon-list` class along with the `{icon}-svg` class where {icon} is the name of the icon in the class.

This method is good for creating a quick list but you are limited to the `$icon-color` that is set in your scss file.

<ul class="icon-list tick-svg">
    <li> Experience the difference, unlock your potential </li>
    <li> Your one-stop shop for all things awesome </li>
    <li> Discover the world of possibilities </li>
</ul>

``` html
<ul class="icon-list tick-svg">
    <li> ... </li>
</ul>
```

The second method is to add the `icon-list` class and manually add the icons as you like. This method gives you all the freedoms you would expect.

<ul class="icon-list">
    <li>
        <svg class="icon txt-red"> <use xlink:href="/svg/naykel-ui.svg#tick-round"></use> </svg>
        Experience the difference, unlock your potential
    </li>
    <li>
        <svg class="icon txt-green"> <use xlink:href="/svg/naykel-ui.svg#tick-round"></use> </svg>
        Your one-stop shop for all things awesome
    </li>
    <li>
        <svg class="icon txt-orange"> <use xlink:href="/svg/naykel-ui.svg#tick-round"></use> </svg>
        Discover the world of possibilities
    </li>
</ul>

```html
<ul class="icon-list">
    <li>
        <svg class="icon txt-green"> <use xlink:href="/svg/naykel-ui.svg#tick-round"></use> </svg>
        ...
    </li>
</ul>

```

# Lists




## Base List

By default, the `list-style-position` property is set to `outside`, meaning the marker
(bullet or number) is placed in its own space, outside the main content. This ensures that
items with longer content wrap nicely, making the list easier to read and scan.

The `list-style-position` property determines the positioning of the list marker (bullet
or number) in relation to the list item content.

- **`inside`** works well for **short list items**. The marker is aligned within the
  content flow, keeping everything compact and visually tidy. It's ideal for items that
  fit on a single line such as navigation menus or short lists.

- **`outside`** is better for **longer list items**. It separates the marker from the
  text, making the list easier to scan. However, for long items that wrap to multiple
  lines, the marker can feel disconnected from the content due to the extra space. Despite
  this, `outside` remains the preferred choice for clarity, even with the added spacing.

<div class="grid cols-2 gap-3 va-t">
    <div>
        <ul class="bdr bdr-blue" style="list-style-position: inside; margin-inline-start: 0;">
            <li>List item one</li>
            <li>List item two</li>
            <li>List item three</li>
        </ul>
        <ul class="bdr bdr-blue" style="list-style-position: outside;">
            <li>List item one</li>
            <li>List item two</li>
            <li>List item three</li>
        </ul>
    </div>
    <div>
        <ul class="bdr bdr-blue" style="list-style-position: inside; margin-inline-start: 0;">
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate molestiae eaque sed impedit?</li>
            <li>Soluta sint, quia quidem et incidunt, id tempore commodi non deleniti repellendus molestias!</li>
        </ul>
        <ul class="bdr bdr-blue" style="list-style-position: outside;">
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate molestiae eaque sed impedit?</li>
            <li>Soluta sint, quia quidem et incidunt, id tempore commodi non deleniti repellendus molestias!</li>
        </ul>
    </div>
</div>

---

- List item one
- List item two
- List item three

---

Nested lists

- List item one
    1. Nested list item one
    2. Nested list item two
        - Nested list item two
        - Nested list item three
    3. Nested list item three
- List item two
- List item three

---

- List item one
    ```php +torchlight-php
    // code block
    ```

    Paragraph in a list item.
    
    - Nested list item three
- List item two

    Paragraph in a list item.

- List item three
  
- List item one
    - Nested list item one
    - Nested list item two
    ```php +torchlight-php
    // code block
    ```
    - Nested list item three
- List item two

    Paragraph in a list item.

- List item three
---




## Icon Lists

There are 2 ways to create an icon list. The first method is to create your list and apply
the `icon-list` class along with the `{icon}-svg` class where {icon} is the name of the
icon in the class.

This method is good for creating a quick list but you are limited to the `$icon-color`
that is set in your scss file.

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

The second method is to add the `icon-list` class and manually add the icons as you like.
This method gives you all the freedoms you would expect.

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

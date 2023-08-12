JTB Frequently Asked Questions

<!-- MarkdownTOC -->

- [How do I center content?](#how-do-i-center-content)
- [How do I override breakpoints?](#how-do-i-override-breakpoints)
- [SCSS Maps](#scss-maps)
    - [How do I add/update values in a map?](#how-do-i-addupdate-values-in-a-map)

<!-- /MarkdownTOC -->

<a id="how-do-i-center-content"></a>
## How do I center content?


<a id="how-do-i-override-breakpoints"></a>
## How do I override breakpoints?

Refer to [How do I add/update values in a map?](#how-do-i-addupdate-values-in-a-map)



<a id="scss-maps"></a>
## SCSS Maps

<a id="how-do-i-addupdate-values-in-a-map"></a>
### How do I add/update values in a map?

Create a default-map and empty custom-map both with the `!default` flag, then merge together as the default-map.

```scss
// src/vars_color.scss
$default-map: (
    "red": hsl(354, 70%, 54%),
    "green": hsl(134, 61%, 41%),
)!default;
$custom-map: () !default;
$default-map: map-merge($default-map, $custom-map);
```

Make sure you add the `@forward` rule to the relevant style sheet to make the maps available to load with the `@use` rule. Then, import the style sheet with the `@use` rule and add the custom-map like any other updated variable.

```scss
// src/vars_color.scss
@use "src/vars_colors" as * with (
    $custom-map: (
        "blue": blue,   // adds new style
        "green": green, // updates existing style
    )
);
```


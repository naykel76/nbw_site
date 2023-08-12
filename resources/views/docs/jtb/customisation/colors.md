# Customizing Colors

<!-- TOC -->

- [Base Colors](#base-colors)
    - [Accessing Individual Values](#accessing-individual-values)
    - [CSS Variables](#css-variables)
- [Theme Colors](#theme-colors)
- [Colour Shades](#colour-shades)
- [Manually Create Shade(s)](#manually-create-shades)
- [Base Color Shades](#base-color-shades)

<!-- /TOC -->

<a id="markdown-base-colors" name="base-colors"></a>

## Base Colors

The `$base-colors` map found in the `src/base/vars_colors` file contains a list of colors that
serves as a centralised resource for managing colors within the JTB framework.

<div class="grid cols-5">
    <div class="bx tac stone">stone</div>
    <div class="bx tac brown">brown</div>
    <div class="bx tac red">red</div>
    <div class="bx tac orange">orange</div>
    <div class="bx tac amber">amber</div>
    <div class="bx tac yellow">yellow</div>
    <div class="bx tac lime">lime</div>
    <div class="bx tac emerald">emerald</div>
    <div class="bx tac green">green</div>
    <div class="bx tac teal">teal</div>
    <div class="bx tac cyan">cyan</div>
    <div class="bx tac sky">sky</div>
    <div class="bx tac blue">blue</div>
    <div class="bx tac indigo">indigo</div>
    <div class="bx tac purple">purple</div>
    <div class="bx tac fuchsia">fuchsia</div>
    <div class="bx tac pink">pink</div>
    <div class="bx tac rose">rose</div>
</div>

<div class="bx warning flex">
    <svg class="icon wh-3 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#warning-round"></use></svg>
    <div>By default every unprefixed theme or color class will apply basic or advanced theme styles such as border, background and text color. If you don't want the complete theme styles then you can use prefixed classes to apply the styles you want. For example 'bg-red'.</div>
</div>



<a id="markdown-accessing-individual-values" name="accessing-individual-values"></a>

### Accessing Individual Values

You can access `$base-colors` by using the scss `map-get` function, the  `get` helper function, or
in the case of theme colors you can access them directly using the appropriate scss variable.
`$primary`, `$secondary`, `$accent`

 <!-- using CSS variables
or utilizing the `map-get` function in SCSS. -->


<a id="markdown-getkey-map-helper-function" name="getkey-map-helper-function"></a>

###### `get('key', 'map')` helper function

```scss
@use "../functions/get" as *;

@debug get('sky', $base-colors);
```

<a id="markdown-map-getmap-key-scss-function" name="map-getmap-key-scss-function"></a>

###### `map-get('map', 'key')` SCSS function
```scss
@debug map-get($base-colors, 'rose');
```

<a id="markdown-css-variables" name="css-variables"></a>

### CSS Variables

To provide convenience and flexibility, the `$base-colors` automatically adds all the colors to the
`:root` of your CSS, making them readily available as CSS variables. This allows you to easily
access the corresponding color values throughout your stylesheets. For example:

```scss
// Each color in the color map
$base-colors: (
    "red": #dc3848,
    "orange": #fd7e17,
      /* ...and so on for all colors in the map */
)

// Automatically generates
:root {
  --amber: #dc3848;
  --red: #fd7e17;
  /* ...and so on for all colors in the map */
}
```

<a id="markdown-theme-colors" name="theme-colors"></a>

## Theme Colors

For convenience, theme colors have been organised into a separate map called `$theme-colors`,
which can be found in the `src/base/vars_colors` file. By separating these colors into their own
map, it becomes easier to create themed elements when using loops and functions.

You can access theme colors the same as previously described except in the `$theme-colors` map.

```scss
@use "../functions/get" as *;

@debug get('primary', $theme-colors);
```


Fore more information refer to [themes page](docs/jtb/customisation/themes) for detailed information.

<a id="markdown-colour-shades" name="colour-shades"></a>

## Colour Shades

This is not a perfect system but it is good for making quick color shades.

```scss
$config: (
    "shades": (
        "create-base": true,
        "create-theme": false,
        "step": 20,
    ),
);
```

<a id="markdown-manually-create-shades" name="manually-create-shades"></a>

## Manually Create Shade(s)

<a id="markdown-base-color-shades" name="base-color-shades"></a>

## Base Color Shades

<section id="base-colors">
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Stone</p>
        <div class="py stone-1">1</div>
        <div class="py stone-2">2</div>
        <div class="py stone-3">3</div>
        <div class="py stone-4">4</div>
        <div class="py stone-5">5</div>
        <div class="py stone-6">6</div>
        <div class="py stone-7">7</div>
        <div class="py stone-8">8</div>
        <div class="py stone-9">9</div>
        <div class="py stone-10">10</div>
        <div class="py stone-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Brown</p>
        <div class="py brown-1">1</div>
        <div class="py brown-2">2</div>
        <div class="py brown-3">3</div>
        <div class="py brown-4">4</div>
        <div class="py brown-5">5</div>
        <div class="py brown-6">6</div>
        <div class="py brown-7">7</div>
        <div class="py brown-8">8</div>
        <div class="py brown-9">9</div>
        <div class="py brown-10">10</div>
        <div class="py brown-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Red</p>
        <div class="py red-1">1</div>
        <div class="py red-2">2</div>
        <div class="py red-3">3</div>
        <div class="py red-4">4</div>
        <div class="py red-5">5</div>
        <div class="py red-6">6</div>
        <div class="py red-7">7</div>
        <div class="py red-8">8</div>
        <div class="py red-9">9</div>
        <div class="py red-10">10</div>
        <div class="py red-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Orange</p>
        <div class="py orange-1">1</div>
        <div class="py orange-2">2</div>
        <div class="py orange-3">3</div>
        <div class="py orange-4">4</div>
        <div class="py orange-5">5</div>
        <div class="py orange-6">6</div>
        <div class="py orange-7">7</div>
        <div class="py orange-8">8</div>
        <div class="py orange-9">9</div>
        <div class="py orange-10">10</div>
        <div class="py orange-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Amber</p>
        <div class="py amber-1">1</div>
        <div class="py amber-2">2</div>
        <div class="py amber-3">3</div>
        <div class="py amber-4">4</div>
        <div class="py amber-5">5</div>
        <div class="py amber-6">6</div>
        <div class="py amber-7">7</div>
        <div class="py amber-8">8</div>
        <div class="py amber-9">9</div>
        <div class="py amber-10">10</div>
        <div class="py amber-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Yellow</p>
        <div class="py yellow-1">1</div>
        <div class="py yellow-2">2</div>
        <div class="py yellow-3">3</div>
        <div class="py yellow-4">4</div>
        <div class="py yellow-5">5</div>
        <div class="py yellow-6">6</div>
        <div class="py yellow-7">7</div>
        <div class="py yellow-8">8</div>
        <div class="py yellow-9">9</div>
        <div class="py yellow-10">10</div>
        <div class="py yellow-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Lime</p>
        <div class="py lime-1">1</div>
        <div class="py lime-2">2</div>
        <div class="py lime-3">3</div>
        <div class="py lime-4">4</div>
        <div class="py lime-5">5</div>
        <div class="py lime-6">6</div>
        <div class="py lime-7">7</div>
        <div class="py lime-8">8</div>
        <div class="py lime-9">9</div>
        <div class="py lime-10">10</div>
        <div class="py lime-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Emerald</p>
        <div class="py emerald-1">1</div>
        <div class="py emerald-2">2</div>
        <div class="py emerald-3">3</div>
        <div class="py emerald-4">4</div>
        <div class="py emerald-5">5</div>
        <div class="py emerald-6">6</div>
        <div class="py emerald-7">7</div>
        <div class="py emerald-8">8</div>
        <div class="py emerald-9">9</div>
        <div class="py emerald-10">10</div>
        <div class="py emerald-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Green</p>
        <div class="py green-1">1</div>
        <div class="py green-2">2</div>
        <div class="py green-3">3</div>
        <div class="py green-4">4</div>
        <div class="py green-5">5</div>
        <div class="py green-6">6</div>
        <div class="py green-7">7</div>
        <div class="py green-8">8</div>
        <div class="py green-9">9</div>
        <div class="py green-10">10</div>
        <div class="py green-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Teal</p>
        <div class="py teal-1">1</div>
        <div class="py teal-2">2</div>
        <div class="py teal-3">3</div>
        <div class="py teal-4">4</div>
        <div class="py teal-5">5</div>
        <div class="py teal-6">6</div>
        <div class="py teal-7">7</div>
        <div class="py teal-8">8</div>
        <div class="py teal-9">9</div>
        <div class="py teal-10">10</div>
        <div class="py teal-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Cyan</p>
        <div class="py cyan-1">1</div>
        <div class="py cyan-2">2</div>
        <div class="py cyan-3">3</div>
        <div class="py cyan-4">4</div>
        <div class="py cyan-5">5</div>
        <div class="py cyan-6">6</div>
        <div class="py cyan-7">7</div>
        <div class="py cyan-8">8</div>
        <div class="py cyan-9">9</div>
        <div class="py cyan-10">10</div>
        <div class="py cyan-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Sky</p>
        <div class="py sky-1">1</div>
        <div class="py sky-2">2</div>
        <div class="py sky-3">3</div>
        <div class="py sky-4">4</div>
        <div class="py sky-5">5</div>
        <div class="py sky-6">6</div>
        <div class="py sky-7">7</div>
        <div class="py sky-8">8</div>
        <div class="py sky-9">9</div>
        <div class="py sky-10">10</div>
        <div class="py sky-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Blue</p>
        <div class="py blue-1">1</div>
        <div class="py blue-2">2</div>
        <div class="py blue-3">3</div>
        <div class="py blue-4">4</div>
        <div class="py blue-5">5</div>
        <div class="py blue-6">6</div>
        <div class="py blue-7">7</div>
        <div class="py blue-8">8</div>
        <div class="py blue-9">9</div>
        <div class="py blue-10">10</div>
        <div class="py blue-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Indigo</p>
        <div class="py indigo-1">1</div>
        <div class="py indigo-2">2</div>
        <div class="py indigo-3">3</div>
        <div class="py indigo-4">4</div>
        <div class="py indigo-5">5</div>
        <div class="py indigo-6">6</div>
        <div class="py indigo-7">7</div>
        <div class="py indigo-8">8</div>
        <div class="py indigo-9">9</div>
        <div class="py indigo-10">10</div>
        <div class="py indigo-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Purple</p>
        <div class="py purple-1">1</div>
        <div class="py purple-2">2</div>
        <div class="py purple-3">3</div>
        <div class="py purple-4">4</div>
        <div class="py purple-5">5</div>
        <div class="py purple-6">6</div>
        <div class="py purple-7">7</div>
        <div class="py purple-8">8</div>
        <div class="py purple-9">9</div>
        <div class="py purple-10">10</div>
        <div class="py purple-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Fuchsia</p>
        <div class="py fuchsia-1">1</div>
        <div class="py fuchsia-2">2</div>
        <div class="py fuchsia-3">3</div>
        <div class="py fuchsia-4">4</div>
        <div class="py fuchsia-5">5</div>
        <div class="py fuchsia-6">6</div>
        <div class="py fuchsia-7">7</div>
        <div class="py fuchsia-8">8</div>
        <div class="py fuchsia-9">9</div>
        <div class="py fuchsia-10">10</div>
        <div class="py fuchsia-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Pink</p>
        <div class="py pink-1">1</div>
        <div class="py pink-2">2</div>
        <div class="py pink-3">3</div>
        <div class="py pink-4">4</div>
        <div class="py pink-5">5</div>
        <div class="py pink-6">6</div>
        <div class="py pink-7">7</div>
        <div class="py pink-8">8</div>
        <div class="py pink-9">9</div>
        <div class="py pink-10">10</div>
        <div class="py pink-11">11</div>
    </div>
    <div class="grid-0 cols-12 tac va-c">
        <p class="tal">Rose</p>
        <div class="py rose-1">1</div>
        <div class="py rose-2">2</div>
        <div class="py rose-3">3</div>
        <div class="py rose-4">4</div>
        <div class="py rose-5">5</div>
        <div class="py rose-6">6</div>
        <div class="py rose-7">7</div>
        <div class="py rose-8">8</div>
        <div class="py rose-9">9</div>
        <div class="py rose-10">10</div>
        <div class="py rose-11">11</div>
    </div>
</section>


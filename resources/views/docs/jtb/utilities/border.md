# Border Utilities

Border utilities are used to add or remove borders from elements.

- [Border Width](#border-width)
    - [Size Map](#size-map)
- [Border Style](#border-style)
- [Border Color](#border-color)
    - [Size Map](#size-map-1)
- [Border Style](#border-style-1)
- [Border Radius](#border-radius)
    - [Variants](#variants)
    - [Size Map](#size-map-2)
- [Border Style](#border-style-2)
- [Default Border](#default-border)
- [Border Positions](#border-positions)
- [Border Width](#border-width-1)
- [Techniques](#techniques)
    - [Clip Border Radius](#clip-border-radius)


custom identifier: yes

- create theme with dark variation like alerts


**Variant Maps** are a bit different to size or value maps as they include specific values
intended to be used in a specific context. For example, the `rounded-1` uses a set value
of 1 rem but `rounded-sm` can be used with any value.

Does the really matter?? not really because they can be combined with sizes but it is just
a mind set where the user can ....


- have two seperate maps and merge making it easier to control custom variants


## Border Width

### Size Map

## Border Style

## Border Color

### Size Map

## Border Style

## Border Radius

### Variants

### Size Map

## Border Style



<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
## Default Border

Add the `bdr` class to to any element to add the default `$border`

```html
<div class="bdr"></div>
```

## Border Positions

You can apply any of the axis or position modifiers to add a border to a specific side of an element.

<div class="grid cols-4 tac">
    <div class="bx pxy-05"><div class="bdr-t bdr-blue pxy-05"><code>bdr-t</code></div></div>
    <div class="bx pxy-05"><div class="bdr-b bdr-blue pxy-05"><code>bdr-b</code></div></div>
    <div class="bx pxy-05"><div class="bdr-l bdr-blue pxy-05"><code>bdr-l</code></div></div>
    <div class="bx pxy-05"><div class="bdr-r bdr-blue pxy-05"><code>bdr-r</code></div></div>
</div>
<div class="grid cols-4 tac">
    <div class="bx pxy-05"><div class="bdr-x bdr-blue pxy-05"><code>bdr-x</code></div></div>
    <div class="bx pxy-05"><div class="bdr-y bdr-blue pxy-05"><code>bdr-y</code></div></div>
    <div class="bx pxy-05"><div class="bdr-x bdr-y bdr-blue pxy-05"><code>bdr-x bdr-y</code></div></div>
</div>



```html
<div class="grid cols-4 tac">
    <div class="bx pxy-05"><div class="bdr-t pxy-05"><code>bdr-t</code> top</div></div>
    <div class="bx pxy-05"><div class="bdr-b pxy-05"><code>bdr-b</code> bottom</div></div>
    <div class="bx pxy-05"><div class="bdr-l pxy-05"><code>bdr-l</code> left</div></div>
    <div class="bx pxy-05"><div class="bdr-r pxy-05"><code>bdr-r</code> right</div></div>
</div>
```

<div class="grid cols-4 tac bx">
    <div class="pxy-05"><div class="bdr bdr-t-0 pxy-05"><code>bdr bdr-t-0</code></div></div>
    <div class="pxy-05"><div class="bdr bdr-b-0 pxy-05"><code>bdr bdr-b-0</code></div></div>
    <div class="pxy-05"><div class="bdr bdr-l-0 pxy-05"><code>bdr bdr-l-0</code></div></div>
    <div class="pxy-05"><div class="bdr bdr-r-0 pxy-05"><code>bdr bdr-r-0</code></div></div>
</div>


## Border Width

<div class="grid cols-3 gap-1 tac bx">
    <div class="pxy-05"><div class="bdr-3 pxy-05"><code>bdr</code></div></div>
    <div class="pxy-05"><div class="bdr bdr-x-0 pxy-05"><code>bdr bdr-x-0</code></div></div>
    <div class="pxy-05"><div class="bdr bdr-y-0 pxy-05"><code>bdr bdr-y-0</code></div></div>
</div>

<div class="grid cols-4 tac bx">
    <div class="pxy-05"><div class="bdr bdr-t-0 pxy-05"><code>bdr bdr-t-0</code></div></div>
    <div class="pxy-05"><div class="bdr bdr-b-0 pxy-05"><code>bdr bdr-b-0</code></div></div>
    <div class="pxy-05"><div class="bdr bdr-l-0 pxy-05"><code>bdr bdr-l-0</code></div></div>
    <div class="pxy-05"><div class="bdr bdr-r-0 pxy-05"><code>bdr bdr-r-0</code></div></div>
</div>

## Techniques

### Clip Border Radius

Apply the `overflow-hidden` class to clip the border radius of an element. This is useful when you
want to add a border radius to an element that contains an image.

<div class="grid cols-4">
    <div class="rounded-2 bdr-5 bdr-red">
        <img src="/images/naykel-400.png">
    </div>
    <div class="rounded-2 bdr-5 bdr-red overflow-hidden">
        <img src="/images/naykel-400.png">
    </div>
</div>

```html
<div class="rounded-2 overflow-hidden">
    <img src="">
</div>
```
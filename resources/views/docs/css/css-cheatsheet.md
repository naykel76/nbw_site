# CSS Cheatsheet
<!-- TOC -->

- [Pulse Animation](#pulse-animation)
- [`clamp(min, val, max)`](#clampmin-val-max)
- [Grid](#grid)
    - [Grid Two Column Layouts](#grid-two-column-layouts)
        - [Grid with fluid column and fixed column (non-responsive)](#grid-with-fluid-column-and-fixed-column-non-responsive)
    - [Auto Grid](#auto-grid)
    - [Change between row and column with `grid-auto-flow`](#change-between-row-and-column-with-grid-auto-flow)
- [Transition](#transition)
    - [Transition element from left to right](#transition-element-from-left-to-right)

<!-- /TOC -->

<a id="markdown-pulse-animation" name="pulse-animation"></a>

## Pulse Animation

Pulses the opacity

<style>
    @keyframes pulse {
        50% {
            opacity: .1
        }
    }
    .animate-pulse-slow {
        animation: pulse 3s ease-in-out infinite;
    }
</style>

<div class="flex">
    <img style="animation-duration: 1s" src="/svg/blur-red.svg" class="wh-10 animate-pulse-slow">
    <img style="animation-duration: 2s" src="/svg/blur-pink.svg" class="wh-10 animate-pulse-slow">
    <img src="/svg/blur-yellow.svg" class="wh-10 animate-pulse-slow">
</div>

```css
<style>
    @keyframes pulse {
        50% {
            opacity: .1
        }
    }
    .animate-pulse-slow {
        animation: pulse 3s ease-in-out infinite;
    }
</style>
```

```html
<div class="flex">
    <img style="animation-duration: 1s" src="/svg/blur-red.svg" class="wh-10 animate-pulse-slow">
    <img style="animation-duration: 2s" src="/svg/blur-pink.svg" class="wh-10 animate-pulse-slow">
    <img src="/svg/blur-yellow.svg" class="wh-10 animate-pulse-slow">
</div>
```

<a id="markdown-clampmin-val-max" name="clampmin-val-max"></a>

## `clamp(min, val, max)`

`min` The minimum value is the smallest (most negative) value. This is the lower bound in the range of allowed values. If the preferred value is less than this value, the minimum value will be used.

`val` The preferred value is the expression whose value will be used as long as the result is between the minimum and maximum values.

`max` The maximum value is the largest (most positive) expression value to which the value of the property will be assigned if the preferred value is greater than this upper bound.

<a id="markdown-grid" name="grid"></a>

## Grid
<a id="markdown-grid-two-column-layouts" name="grid-two-column-layouts"></a>

### Grid Two Column Layouts

<a id="markdown-grid-with-fluid-column-and-fixed-column-non-responsive" name="grid-with-fluid-column-and-fixed-column-non-responsive"></a>

#### Grid with fluid column and fixed column (non-responsive)

```css
grid-template-columns: 3rem 1fr;
```
<div class="grid">
    <div class="grid-0.5 bx pxy-05" style="grid-template-columns: 5rem 1fr;">
        <div class="bx red" style="grid-column: 2"></div>
        <div class="bx blue"></div>
        <div class="bx blue"></div>
    </div>
</div>

``` css
/* 3 columns equal widths */
grid-template-columns: repeat(3, 1fr);
```

<a id="markdown-auto-grid" name="auto-grid"></a>

### Auto Grid

The smallest we can get is {n}rem and the 1fr says get as big as you can get until you can get until you can fit another item in at the smallest

``` css
/* 3 columns equal widths */
grid-template-columns: repeat(auto-fit, minmax(25%, 1fr));

grid-template-columns: repeat(auto-fit, minmax(min(10rem, 100%), 1fr));
grid-template-columns: repeat(auto-fit, minmax(10rem, 1fr));
```

<a id="markdown-change-between-row-and-column-with-grid-auto-flow" name="change-between-row-and-column-with-grid-auto-flow"></a>

### Change between row and column with `grid-auto-flow`

```css
.columns { grid-auto-flow: column; }

@media (min-width:40rem){
    .columns { grid-auto-flow: row; }
}
```




<a id="markdown-transition" name="transition"></a>

## Transition

https://developer.mozilla.org/en-US/docs/Web/CSS/transition

The transition get applied to the main class, not the class to be transitioned.

```css
transition: [property] [duration] [timing-function] [delay];
transition-property:
transition-delay:
transition-duration:
transition-timing-function: [ease|linear|ease-in|ease-out|ease-in-out|step-start|step-end]
```

<style>
.bx.example1 { transition: background-color 0.2s ease, padding 0.8s linear; }
.bx.example1:hover { background-color: pink; padding: 2rem; }
</style>

<div class="bx example1"> Hover over me! </div>

You can specify a particular property, use a value of `all`, or use a comma separate value sets to do different transitions on different properties:

```css
/* single property */
.element { transition: background-color 1s ease-in; }
/* all transitions */
.element { transition: all 1s ease-in; }
/* selected properties */
.element { transition: background 0.2s ease, padding 0.8s linear; }

.element:hover { background-color: blue; padding: 3rem; }
```


<a id="markdown-transition-element-from-left-to-right" name="transition-element-from-left-to-right"></a>

### Transition element from left to right

<style>
.bx.example2 { background: hsl(200, 100%, 20%0;) }
.child { width: 300px; transition: all 2s cubic-bezier(0.4, 0, 0.2, 1); }
.bx.example2:hover .child {  transform: translateX(100%); }
</style>


```css
.bx.example2 { background: hsl(200, 100%, 20%0;) }
.child { width: 300px; transition: all 2s; }
.bx.example2:hover .child {  transform: translateX(100%); }
```

<div class="bx example2 flex">
    <div class="child"> Hover over the parent to see me slide! </div>
</div>


# CSS Cheatsheet
<!-- TOC -->

- [Transition](#transition)
    - [Transition element from left to right](#transition-element-from-left-to-right)

<!-- /TOC -->

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


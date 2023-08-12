# Themes and Colors

<!-- MarkdownTOC -->

- [Theme with Buttons](#theme-with-buttons)
- [Themes with Hover, Focus, and Other States](#themes-with-hover-focus-and-other-states)
- [Outline](#outline)
- [Theme Testing](#theme-testing)

<!-- /MarkdownTOC -->



## Theme with Buttons

These examples use a theme stacked with the `btn` class.

<div class="grid cols-5">
    <div class="btn primary">primary</div>
    <div class="btn secondary">secondary</div>
    <div class="btn light">light</div>
    <div class="btn dark">dark</div>
    <div class="btn muted">muted</div>
    <div class="btn danger">danger</div>
    <div class="btn success">success</div>
    <div class="btn info">info</div>
    <div class="btn warning">warning</div>
    <div class="btn danger-light">danger-light</div>
    <div class="btn info-light">info-light</div>
    <div class="btn success-light">success-light</div>
    <div class="btn warning-light">warning-light</div>
</div>
<div class="grid cols-5 mt">
    <div class="btn outline primary">primary</div>
    <div class="btn outline secondary">secondary</div>
    <div class="btn outline light">light</div>
    <div class="btn outline dark">dark</div>
    <div class="btn outline muted">muted</div>
    <div class="btn outline danger">danger</div>
    <div class="btn outline success">success</div>
    <div class="btn outline info">info</div>
    <div class="btn outline warning">warning</div>
    <div class="btn outline danger-light">danger-light</div>
    <div class="btn outline info-light">info-light</div>
    <div class="btn outline success-light">success-light</div>
    <div class="btn outline warning-light">warning-light</div>
</div>

## Themes with Hover, Focus, and Other States

Add the `withState` class the any theme to handle hover, focus and other states.

State colors are calculated based on the `$base` color for the theme. Colors can be overridden by defining the key and color in the `$themes-map`



```html
<div class="primary withState">primary</div>
```

<div class="grid cols-4 tac">
    <div class="bx primary withState">primary</div>
    <div class="bx secondary withState">secondary</div>
    <div class="bx light withState">light</div>
    <div class="bx dark withState">dark</div>
    <div class="bx muted withState">muted</div>
    <div class="bx danger withState">danger</div>
    <div class="bx success withState">success</div>
    <div class="bx info withState">info</div>
    <div class="bx warning withState">warning</div>
    <div class="bx danger-light withState">danger-light</div>
    <div class="bx info-light withState">info-light</div>
    <div class="bx success-light withState">success-light</div>
    <div class="bx warning-light withState">warning-light</div>
</div>

## Outline

<div class="grid cols-4 tac">
    <div class="bx primary outline">primary</div>
    <div class="bx secondary outline">secondary</div>
    <div class="bx light outline">light</div>
    <div class="bx dark outline">dark</div>
    <div class="bx muted outline">muted</div>
    <div class="bx danger outline">danger</div>
    <div class="bx success outline">success</div>
    <div class="bx info outline">info</div>
    <div class="bx warning outline">warning</div>
    <div class="bx danger-light outline">danger-light</div>
    <div class="bx info-light outline">info-light</div>
    <div class="bx success-light outline">success-light</div>
    <div class="bx warning-light outline">warning-light</div>
</div>




## Theme Testing

<div class="bx w-600px mx-auto primary">
    <div class="bx-title">Primary Box</div>
    <div class="flex va-c gg">
        <a href="">Primary Link</a>
        <a href="" class="hover">Primary Hover</a>
        <button class="btn primary">Primary</button>
        <button class="btn secondary">Secondary</button>
    </div>
    <!-- if no additional theme is added all children will pick up on the master theme defaults -->
    <div class="bx secondary mt">
        <div class="bx-title">Secondary Box</div>
        <div class="flex va-c gg">
            <a href="">Secondary Link</a>
            <a href="" class="hover">Secondary Hover</a>
            <button class="btn primary">Primary</button>
            <button class="btn secondary">Secondary</button>
        </div>
    </div>
    <!-- works well until you want to use defaults -->
    <div class="bx white mt">
        <div class="bx-title">White Box</div>
        <p>How to reset to default links??</p>
        <div class="flex va-c gg">
            <a href="">White Link</a>
            <a href="" class="hover">White Hover</a>
            <button class="btn primary">Primary</button>
            <button class="btn secondary">Secondary</button>
        </div>
    </div>
</div>

```scss
"theme-name": (
"base": grey,
"color": white,
"border-color": teal,

// only works withState, btn look after itself
"link-color": red,
"link-hover-color": blue,
"hover-bg": pink,
"hover-color": green,

"default-links": true, // ** force stlye creation with default styles
"has-btn": true,
),
```

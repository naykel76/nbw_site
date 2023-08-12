# Controls With Leading Or Trailing Addons

To include addons (e.g. icons, text) with your form control, wrap your input and addons inside a
`withAddons` element and add the `leadingAddon` or `trailingAddon` class. By default addons styles
are setup for icons be can easily be overridden for other elements with utility classes.

<div class="bx warning flex va-c">
    <svg class="icon wh-3 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#warning-round"></use></svg>
    <div>
        <div class="bx-title">Important</div>
        <p class="mt-025">To automatically handle borders, the markup requires placing the addons before the input.</p>
    </div>
</div>

<div class="frm-row">
    <div class="withAddons">
        <div class="leadingAddon light">Leading</div>
        <div class="trailingAddon light">Trailing</div>
        <input type="text">
    </div>
</div>

```html
<div class="frm-row">
    <div class="withAddons">
        <div class="leadingAddon">leading</div>
        <div class="trailingAddon">trailing</div>
        <input type="text">
    </div>
</div>
```

<div class="frm-row">
    <div class="withAddons">
        <div class="leadingAddon dark">
            <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#save"></use> </svg>
        </div>
        <div class="trailingAddon success">
            <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#tick-round"></use> </svg>
        </div>
        <input type="text">
    </div>
</div>

```html
<div class="frm-row">
    <div class="withAddons">
        <div class="leadingAddon dark">
            <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#save"></use> </svg>
        </div>
        <div class="trailingAddon success">
            <svg class="icon"> <use xlink:href="/svg/naykel-ui.svg#tick-round"></use> </svg>
        </div>
        <input type="text">
    </div>
</div>
```

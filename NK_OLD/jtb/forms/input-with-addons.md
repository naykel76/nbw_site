# Controls With Leading Or Trailing Addons

To include addons (e.g. icons, text) with your form control, wrap your input and addons
inside a `withAddons` element and add the `leadingAddon` or `trailingAddon` class.

<div class="frm-row">
    <div class="withAddons">
        <div class="leadingAddon"> Leading </div>
        <div class="trailingAddon"> Trailing </div>
        <input type="text" placeholder="Text input">
    </div>
</div>

```html +parse
<x-gt-alert type="warning">
   <div class="bx-title">Important</div>
    <div class="bx-content mt-05">
        To ensure proper styling and remove the <code>border-radius</code> when using addons, 
        place the addon markup before the <code>input</code> element. This approach ensures 
        that the input field integrates seamlessly with the addons.
    </div>
</x-gt-alert>
```

```html
<div class="frm-row">
    <div class="withAddons">
        <div class="leadingAddon">leading</div>
        <div class="trailingAddon">trailing</div>
        <input type="text">
    </div>
</div>
```

<div class="withAddons">
    <div class="leadingAddon light">Leading</div>
    <div class="trailingAddon light">Trailing</div>
    <input type="text">
</div>
<hr>
<div class="withAddons">
    <div class="leadingAddon light">Leading</div>
    <input type="text">
</div>
<hr>
<div class="withAddons">
    <div class="trailingAddon light">Trailing</div>
    <input type="text">
</div>
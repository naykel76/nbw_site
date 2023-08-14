# Forms

<!-- TOC -->

- [Base Controls](#base-controls)
- [Control Groups](#control-groups)
    - [Horizontal control group](#horizontal-control-group)
    - [Inline control group](#inline-control-group)
- [Control Sizes](#control-sizes)
- [Theme Examples](#theme-examples)
- [Trouble Shooting](#trouble-shooting)
    - [Inconsistent control and button height](#inconsistent-control-and-button-height)

<!-- /TOC -->

<a id="markdown-base-controls" name="base-controls"></a>

## Base Controls

All form controls by default are `inline-flex`.

<div class="grid gg-1 md:cols-2">
    <div class="flex">
        <input id="input" name="input" type="text" placeholder="Text Input">
        <button type="button" class="btn w-6 ml-025">Button</button>
    </div>
    <div class="flex">
        <input id="password" name="password" type="password" placeholder="Password Input">
        <button type="reset" class="btn w-6 ml-025">Reset</button>
    </div>
    <div class="flex">
        <input id="number" name="number" type="number" placeholder="Number Input">
        <button type="submit" class="btn w-6 ml-025">Submit</button>
    </div>
</div>

<a id="markdown-control-groups" name="control-groups"></a>

## Control Groups

Create evenly balanced control groups simply by wrapping the control elements inside a `.frm-row` element. All inputs become 100% wide and vertical spacing is automatically added between rows. All control groups without any additional classes are vertical by default.

<a id="markdown-horizontal-control-group" name="horizontal-control-group"></a>

### Horizontal control group

```html
<div class="frm-row">
    <label for=""> </label>
    <input id="" name="" placeholder="">
</div>
```

<div class="bx">
    <div class="bx-title">Control and Label Only</div>
    <div class="frm-row">
        <label>Label</label>
        <input id="input" name="input" type="text" placeholder="Text Input">
    </div>
    <div class="frm-row">
        <label>Label</label>
        <input id="password" name="password" type="password" placeholder="Password Input">
    </div>
    <div class="bx-title">Control Only</div>
    <div class="frm-row">
        <input id="input" name="input" type="text" placeholder="Text Input">
    </div>
    <div class="frm-row">
        <input id="password" name="password" type="password" placeholder="Password Input">
    </div>
</div>

<a id="markdown-inline-control-group" name="inline-control-group"></a>

### Inline control group

To create and inline control group, add the `inline` class to the `frm-row` parent element and wrap the `control` in the `flex-col` utility class.

By default, controls are inline-flex so the control will shrink. Add the `w-full` utility class to get the control fill out the available space.

<div class="bx info-light">While it is possible to achieve the same result using utility classes, there is some fine tuning that comes with the <code>inline</code> class that make life a little easier!</div>

<div class="bx">
    <div class="frm-row inline">
        <label for="input">Label</label>
        <div class="flex-col w-full">
            <input name="" id="">
            <div class="help mb-025 txt-muted"> <small>Add some help text here!</small> </div>
        </div>
    </div>
</div>

```html
<div class="frm-row inline">
    <label for="input">Label</label>
    <div class="flex-col w-full">
        <input name="input">
        <small class="txt-red" role="alert"> The input field is required. </small>
    </div>
</div>
```

<a id="markdown-control-sizes" name="control-sizes"></a>

## Control Sizes

<div class="flex-col gg-1">
    <div>
        <input type="text" class="xs" placeholder="x-Small">
        <button class="ml-05 btn xs"> x-Small </button>
    </div>
    <div>
        <input type="text" class="sm" placeholder="Small">
        <button class="ml-05 btn sm"> Small </button>
    </div>
    <div>
        <input type="text" placeholder="Normal">
        <button class="ml-05 btn"> Normal </button>
    </div>
    <div>
        <input type="text" class="md" placeholder="Medium">
        <button class="ml-05 btn md"> Medium </button>
    </div>
    <div>
        <input type="text" class="lg" placeholder="Large">
        <button class="ml-05 btn lg"> Large </button>
    </div>
</div>

<a id="markdown-theme-examples" name="theme-examples"></a>

## Theme Examples

<div class="frm-row">
    <label for="success" class="txt-green ">Your name</label>
    <input type="text" id="success" class="success-light" placeholder="Success input">
    <p class="txt-green txt-sm">Well done! Some success message.</p>
</div>

<div class="frm-row">
    <label for="error" class="txt-red">Your name</label>
    <input type="text" id="error" class="danger-light" placeholder="Error input">
    <p class="txt-red txt-sm">Bugger! Some error message.</p>
</div>

<a id="markdown-trouble-shooting" name="trouble-shooting"></a>

## Trouble Shooting

<a id="markdown-inconsistent-control-and-button-height" name="inconsistent-control-and-button-height"></a>

### Inconsistent control and button height

It is important that the input and button have the same border thickness to ensure they are the
same height. In situations where you may want a button or control without a border you will need
to set a fixed height.

<div>
    <input type="text" class="h-3 bdr-5">
    <button class="btn h-3">Click Me</button>
</div>

```html
<input type="text" class="h-3 bdr-5">
<button class="btn h-3">Click Me</button>
```

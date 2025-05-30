# Input

- [Base Controls](#base-controls)
- [Control Groups](#control-groups)
    - [Horizontal Groups](#horizontal-groups)
- [Control Sizes](#control-sizes)
- [Theme Examples](#theme-examples)
- [Examples](#examples)
- [Trouble Shooting](#trouble-shooting)
    - [Inconsistent control and button height](#inconsistent-control-and-button-height)

table>tr*3>td*2 


```html +parse
<x-gt-alert type="warning">
    This document is a work in progress and needs to be reviewed for accuracy.
</x-gt-alert>
```

## Base Controls

All form controls by default are `inline-flex`. This means out of the box they will shrink to fit
the content and you are free to style them as you wish.

<div class="my">
    <label for="input">Label</label>
    <input id="input" name="input" type="text" placeholder="Text input">
    <button type="button" class="btn">Button</button>
</div>

```html
<label for="input"> ... </label>
<input id="input" name="input" type="text" placeholder="Input">
<button type="button" class="btn"> ... </button>
```

## Control Groups

To create balanced control groups, simply wrap the control elements inside a `.frm-row` element.
This will make all inputs 100% wide and automatically add vertical spacing between rows. By
default, all control groups without any additional classes are vertical.

```html
<div class="frm-row">
    <label for=""> </label>
    <input id="" name="" placeholder="">
</div>
```

### Horizontal Groups

<div class="bx">
    <div class="frm-row">
        <label for="name">Name</label>
        <input id="name" placeholder="Enter your name...">
    </div>
    <div class="frm-row">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="example@company.com">
    </div>
</div>

```html
<div class="frm-row">
    <label for="name">Name</label>
    <input id="name" placeholder="Enter your name...">
</div>
<div class="frm-row">
    <label for="email">Email</label>
    <input type="email" id="email" placeholder="example@company.com">
</div>
```


## Control Sizes

<div class="flex-col gap-1">
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

## Examples

<form class="bx light">
    <div class="grid md:cols-2">
        <div class="frm-row">
            <label for="first_name">First name</label>
            <input type="text" id="first_name" placeholder="Mike">
        </div>
        <div class="frm-row">
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" placeholder="Dingle">
        </div>
        <div class="frm-row">
            <label for="company">Company</label>
            <input type="text" id="company" placeholder="Naykel">
        </div>
        <div class="frm-row">
            <label for="phone">Phone number</label>
            <input type="tel" id="phone" placeholder="1111-2345-6789" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}">
        </div>
    </div>
    <div class="frm-row">
        <label for="website">Website URL</label>
        <input type="url" id="website" placeholder="naykel.com.au">
    </div>
    <div class="frm-row">
        <label for="email">Email address</label>
        <input type="email" id="email" placeholder="mike.dingle@company.com">
    </div>
    <div class="frm-row">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="•••••••••">
    </div>
    <div class="frm-row">
        <label for="confirm_password">Confirm password</label>
        <input type="password" id="confirm_password" placeholder="•••••••••">
    </div>
    <div class="frm-row">
        <label>
            <input type="checkbox">
            I agree with the &nbsp;<a href="#">terms and conditions</a>.
        </label>
    </div>
    <button type="submit" class="btn primary">Submit</button>
</form>

```html
<form class="bx light">
    <div class="grid md:cols-2">
        <div class="frm-row">
            <label for="first_name">First name</label>
            <input type="text" id="first_name" placeholder="Mike">
        </div>
        <div class="frm-row">
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" placeholder="Dingle">
        </div>
        <div class="frm-row">
            <label for="company">Company</label>
            <input type="text" id="company" placeholder="Naykel">
        </div>
        <div class="frm-row">
            <label for="phone">Phone number</label>
            <input type="tel" id="phone" placeholder="1111-2345-6789" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}">
        </div>
    </div>
    <div class="frm-row">
        <label for="website">Website URL</label>
        <input type="url" id="website" placeholder="naykel.com.au">
    </div>
    <div class="frm-row">
        <label for="email">Email address</label>
        <input type="email" id="email" placeholder="mike.dingle@company.com">
    </div>
    <div class="frm-row">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="•••••••••">
    </div>
    <div class="frm-row">
        <label for="confirm_password">Confirm password</label>
        <input type="password" id="confirm_password" placeholder="•••••••••">
    </div>
    <div class="frm-row">
        <label>
            <input type="checkbox">
            I agree with the <a href="#">terms and conditions</a>
        </label>
    </div>
    <button type="submit" class="btn primary">Submit</button>
</form>
```
## Trouble Shooting


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

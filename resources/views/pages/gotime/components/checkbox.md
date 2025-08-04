# Checkbox

- [Control Group](#control-group)
    - [Checked](#checked)
    - [Disabled](#disabled)
    - [Error Handling](#error-handling)
- [Control Only](#control-only)
    - [Checked](#checked-1)
    - [Disabled](#disabled-1)
    - [Error Handling](#error-handling-1)
    - [Adding Custom Labels (Closed Tag)](#adding-custom-labels-closed-tag)




## Control Group

```html +torchlight-html
<livewire:gotime.components.checkbox variant="control-group" />
```

```html +torchlight-blade
@verbatim<x-gt-checkbox wire:model="remember" label="Remember Me" />@endverbatim
```

Close the tag to add custom labels.
```html +torchlight-html
<x-gt-checkbox for="agree">
    I have read and agree to <a href="#" class="txt-underline" target="_blank">&nbsp;Terms & Conditions</a>
</x-gt-checkbox>
```

```html +torchlight-blade
@verbatim
<x-gt-checkbox for="agree">
    I have read and agree to <a href="/terms"> Terms & Conditions</a>
</x-gt-checkbox>
@endverbatim
```

---

### Checked

There is nothing special about the checked state of the checkbox in the control
group, it is handled by the `wire:model` attribute.

```html +torchlight-html
<livewire:gotime.components.checkbox variant="control-group-checked" />
```

---

### Disabled

```html +torchlight-html
<livewire:gotime.components.checkbox variant="control-group-disabled" />
```

---

### Error Handling

```html +torchlight-html
<livewire:gotime.components.checkbox variant="control-group-with-error" />
```

---


## Control Only

```html +torchlight-html
<livewire:gotime.components.checkbox variant="control-only" />
```

---

### Checked

Checked is handled by the `wire:model` attribute.

```html +torchlight-html
<livewire:gotime.components.checkbox variant="control-only-checked" />
```

---

### Disabled

```html +torchlight-html
<livewire:gotime.components.checkbox variant="control-only-disabled" />
```

---

### Error Handling

```html +torchlight-html
<livewire:gotime.components.checkbox variant="control-only-with-error" />
```

---

---

### Adding Custom Labels (Closed Tag)




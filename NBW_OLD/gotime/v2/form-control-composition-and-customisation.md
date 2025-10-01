# Form Control Composition and Customisation

- [TLDR](#tldr)
- [Introduction](#introduction)
- [Introduction](#introduction-1)
- [Control Layout](#control-layout)
- [Form Control](#form-control)
- [Control-Group (The Component)](#control-group-the-component)

## TLDR

<div class="adjacent-list-space-1"></div>

- Form controls can be accessed directly using the `gotime::input.controls.{type}` namespace.
- Form controls are wrapped in the `control-with-addons` control layout, allowing for the
  addition of icons or text as leading or trailing add-ons. If there are no add-ons, the
  input is rendered as-is.

- Use `wire:model` to bind Livewire properties or the `for` attribute for vanilla HTML.
- Add the closing tag to access the add-on or other available slots.


<!-- Yes — it makes sense to clarify this distinction properly. You're essentially creating a composable select component, with two layers:

Control Only – just the <select> element (takes options directly)

Control Group – wraps label, errors, etc., and passes props like options down

Here’s a structured setup for both, with clear responsibilities and correct prop handling -->



```html
<!-- control only -->
<x-gotime::v2.input.controls.input for="firstname" />
```

```html
<!-- close the tag to access the add-on slots -->
<x-gotime::v2.input.controls.input for="firstname" >
    <x-slot:leadingAddon>Leading</x-slot:leadingAddon>
    <x-slot:trailingAddon>Trailing</x-slot:trailingAddon>
</x-gotime::v2.input.controls.input >
```

## Introduction

This document outlines the design principles and structure for Gotime form components. It
focuses on building smaller, manageable components that can be flexibly composed together.
Each component is designed to be modular and reusable, which allows for a high level of
customisation and flexibility when creating forms.

**Key concepts:**

- **Control Layout**: A wrapper for the input element, applied only when there are add-ons (icons or text). If no add-ons are present, the input is rendered as-is.
  
- **Form Control**: A basic input element that includes only the essential components for functionality. It does not handle extras like labels, error messages, or help texts.

- **Control Group**: Wraps the input and adds extra features like labeling, error handling, and help text. This typically includes the Control Only component.

---

Now, for the next step, let's go over the **Control Layout** section and make sure we keep it simple and on point with the composition philosophy. Would you like to continue with that?

## Introduction

This document outlines the design principles and structure for Gotime form components. It
focuses on building smaller, manageable components that can be flexibly composed together.
Each component is designed to be modular and reusable, which allows for a high level of
customisation and flexibility when creating forms.

**Key concepts:**

- **Control Layout**: A wrapper for the input element, applied only when there are add-ons
  (icons or text). If no add-ons are present, the input is rendered as-is.
  
- **Form Control**: A basic input element that includes only the essential components for
  functionality. It does not handle extras like labels, error messages, or help texts.

- **Control Group**: Wraps the input and adds extra features like labeling, error
  handling, and help text. This typically includes the Control Only component.



<!-- This needs to be incoperated -->

- note about attributing forwarding and how slots can be used to add extra functionality

- **Attribute Forwarding**: The component and many of the slots supports Laravel's
  attribute forwarding, allowing you to add attributes like `placeholder`, `class`, and
  more directly to the input


These attributes are typically found when using control-groups and may not be available in
all input components.

<div class="adjacent-list-space-1"></div>

- **`for`** 
    
    Primarily defines the `name` and `id` of the input field, required unless `wire:model`
    is used. It links the input to a `<label>` for accessibility and aids with error
    handling, including restoring values with `old($for)`. Think of the `for` attribute as
    a way to bind all the related input elements together.

- **`wire:model`**

    When `wire:model` is defined, the `for` attribute is dynamically set to match the
    value of `wire:model` in the component. 

    If both `for` and `wire:model` are provided, `wire:model` takes precedence. 

- **`value`**  
  Sets the default value of the input. If not provided, it falls back to `old($for)`,
  ensuring that previous form submissions repopulate correctly. 
















## Control Layout

A control layout serves as a wrapper for a form control, enabling additional layout or
styling for the input.

For example, wrapping an input control in the `control-with-addons` layout.

This wrapper places the input inside a `div` with the JTB `withAddons` class, giving
access to the `leadingAddon` and `trailingAddon` slots. These slots allow for the
inclusion of icons or text as **leading** or **trailing** add-ons. Without these slots,
the input is rendered as-is

```html
@if ($leadingAddon || $trailingAddon)
    <!-- Add-ons wrap the input -->
    <div class="withAddons">
        <!-- Other code processes the add-ons -->
        {{ $slot }} <!-- The input is injected here -->
    </div>
@else
    {{ $slot }} <!-- The input is injected here -->
@endif
```

This layout provides the option to add icons or text as leading or trailing add-ons.

## Form Control

A control component is the basic input element that includes just the necessary parts to
make the input functional. It doesn’t handle extras like error messages, labels, or help
texts. It's simply the input field with the essential attributes for handling values.

Form controls can be accessed using the `gotime::input.controls.{type}` namespace.

```html +parse
<x-gotime::v2.input.controls.input for="firstname" />
<x-gotime::v2.input.controls.input wire:model="firstname" />
```

## Control-Group (The Component)

The final form component is typically wrapped in a control-group layout. This layout
includes elements like the label, error handling, help text (which can be displayed before
or after the input, e.g., as a popover), and optional styling classes.

For details on specific components, refer to the respective component documentation.

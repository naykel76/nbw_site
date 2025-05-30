# Input
- [Overview](#overview)
- [Component Composition](#component-composition)
- [Usage](#usage)
- [Attributes](#attributes)
- [Error Handling](#error-handling)
- [Customisation](#customisation)
    - [Label](#label)
    - [Control Only](#control-only)
    - [Help Text](#help-text)
    - [Tooltip](#tooltip)
    - [Leading and Trailing Addons](#leading-and-trailing-addons)

## Overview

The `input` component is a flexible and reusable element for creating form fields in the
Gotime package. It supports extensive customisation, including labels, help text, error
handling, and slots for further control over the layout.

**Key Features**:

<div class="adjacent-list-space-1"></div>

- **Dynamic Data Binding**: Bind data using the `for` attribute or `wire:model` for
  Livewire integration.

- **Customisable Control Group**: Input wrapped in a `frm-row` control group, supporting
  inline or block layout.

- **Flexible Label and Help Text**: Dynamically add labels and help text.
  
- **Leading and Trailing Addons**: Add content (icons, text, etc.) before or after the
  input using slots.

- **Error Handling**: Automatically display error messages below the input, within the
  control group.

- **Tooltip Support**: Add tooltips for additional context or clarification.

- **Attribute Forwarding**: Supports Laravel's attribute forwarding, allowing you to add
  attributes like `placeholder`, `class`, and more directly to the input.

<hr>

## Component Composition

Under the hood, the Input component uses composition, to build form controls. This offers
greater flexibility, enabling you to customise and extend the input field to meet a wide
range of form requirements.

For more information on component composition and how it can be used to create flexible
and reusable components, refer to the [Control Composition and Design
Principles](/gotime/v2/form-control-composition-and-customisation) section.

<hr>

## Usage

To use the `input` component, render it and specify either the `for` attribute or
`wire:model` for Livewire components. This will create a basic input wrapped in a
`frm-row` control group, which is organized horizontally by default.

```html +parse
<livewire:gotime.components.input variant="basic-input"/>
```

```html
<x-gt-input for="email" />
<x-gt-input wire:model="form.email" />
```

<hr>

## Attributes

This component supports the following attributes:

<div class="txt-red fw7">This section needs work!</div>

<!-- update this section and possible seperate common attributes and reference them -->


| Attribute             | Description                                                                |
| :-------------------- | :------------------------------------------------------------------------- |
| `for` or `wire:model` | The name of the input field or Livewire property for binding               |
|                       |                                                                            |
| `value`               | The value of the input field.                                              |
| `class`               | Additional classes to apply to the input field.                            |
| `controlOnly`         | A boolean attribute to render the input without the control group wrapper. |

<hr>

## Error Handling

The `input` component automatically displays an error message below the field when an
error is present. Errors are handled within the control group layout.

```html +parse
<livewire:gotime.components.input variant="input-with-error" />
```

<!-- 
NK::TD 
- overriding the error message
- ignoring the error message
-->

<hr>

## Customisation

<!-- these are some notes but they do not really live here. i will move as required -->
- Add the `rowClass` attribute to apply custom classes to the control group row.
- Add the `label` attribute to add a label to the control group.
- Add the `help-text` attribute to include additional help text below the input.
- Add HTML attributes like `placeholder`, `class`, and more directly to the input.
  NOTE: when using the component HTML attributs are placed on the `input`

### Label

Add a `label` attribute to display a label for the control group.

```html +parse
<livewire:gotime.components.input variant="input-with-label"/>
```

```html 
<x-gt-input wire:mode="email" label="Your email" placeholder="name@example.com"/>
```

### Control Only

Use the `controlOnly` attribute to render the input without the control group wrapper,
rendering only the input field.

Note: When using the `controlOnly` attribute, the label will be stripped out and ignored.

```html +parse
<x-gt-alert type="danger">
NK::TD This example is incorrectly applying the error styles. Why? 
</x-gt-alert>
```

```html
<x-gt-input wire:model='email' controlOnly />
<!-- label will be ignored -->
<x-gt-input wire:model='email' label='Your Email' controlOnly />
```

```html +parse
<livewire:gotime.components.input variant="input-with-control-only"/>
```

<hr>

### Help Text

```html +parse
<livewire:gotime.components.input variant="input-with-help-text-bottom"/>
```

```html
<x-gt-input helpText=""/>
```

By default the help text is displayed below the input field. To display the help text
above the input field, use the `helpTextTop` attribute.

```html +parse
<livewire:gotime.components.input variant="input-with-help-text-top"/>
```


```html
<x-gt-input helpText="" helpTextTop/>
```

### Tooltip

To add a tooltip, close the input component and use the `tooltip` slot. 

**Note**: Tooltips work only when a label is present.

```html +parse
<x-gt-alert type="warning">
    NK::TD Attribute forwarding is not currently supported for tooltips so there is limited styling options.
</x-gt-alert>
```

```html +parse
<livewire:gotime.components.input variant="input-with-label-and-tooltip"/>
```

```html
<x-gt-input for='body' label='Input Label'>
    <x-slot name='tooltip'>
        <!-- tool tip content -->
    </x-slot>
</x-gt-input>
```

<hr>

### Leading and Trailing Addons

Use the `leadingAddon` and `trailingAddon` slots to add content before or after the input.
These can be icons, text, or any other content.

```html +parse
<x-gt-input for="title">
    <x-slot name="leadingAddon">Leading</x-slot>
    <x-slot name="trailingAddon">Trailing</x-slot>
</x-gt-input>
```

```html
<x-gt-input for="title">
    <x-slot name="leadingAddon">Leading</x-slot>
    <x-slot name="trailingAddon">Trailing</x-slot>
</x-gt-input>
```

<hr>

<!-- i think this can be moved?? -->
<!-- ## Slots

Components are created from many smaller components, each with their own slots. This
allows for a high level of customisation.

- The `input` component has three slots: `slot`, `leadingAddon`, and `trailingAddon`.

| Slot            | Description                                     |
| --------------- | ----------------------------------------------- |
| `slot`          | The actual input field.                         |
| `leadingAddon`  | Content (icon/text) displayed before the input. |
| `trailingAddon` | Content (icon/text) displayed after the input.  | --> |


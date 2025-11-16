# Button

- [Basic Usage](#basic-usage)
- [Component Composition](#component-composition)
    - [Slots](#slots)
- [Attributes and Customisation](#attributes-and-customisation)
    - [Styling Buttons](#styling-buttons)
    - [Button Icon](#button-icon)
    - [Icon Position](#icon-position)

## Basic Usage

The icon size is automatically adjusted based on the button text size. 

```html +parse
<x-gt-button text="Button" />
<x-gt-button.primary text="Primary" />
<x-gt-button.secondary text="Secondary" />
<x-gt-button text="Account" icon="user" />
<x-gt-button text="Account" icon="user" iconPosition="right" />
<x-gt-button icon="user" class="icon-only"/>
```

```html +code-blade
@verbatim
<x-gt-button text="Button" />
<x-gt-button.primary text="Primary" />
<x-gt-button.secondary text="Secondary" />
@endverbatim
```

## Component Composition

The base component `<x-gt-button.base />` renders a plain button element with no styling
and provides slots for content and icons. It serves as the foundation for building custom
buttons or variants.

The base component supports **Laravel's attribute forwarding**, allowing you to pass
additional HTML attributes (such as `class`, `id`, or `data-*`) directly to the button
element. This gives you full control over button styling and behavior.

### Slots

The base component supports the following slots:

- `default`: The default slot is used to display the button text. You can use this slot to
  provide the button text directly within the component.

## Attributes and Customisation

| Attribute      | Required | Description                                                |
| :------------- | :------: | :--------------------------------------------------------- |
| `text`         |    No    | The button text to display                                 |
| `icon`         |    No    | The icon to display                                        |
| `iconPosition` |    No    | The icon position (`left` or `right`; defaults to `right`) |

### Styling Buttons

Buttons apply the JTB `btn` class by default, which provides a base style. You can apply
custom styles just like any other HTML button element by using the `class` attribute.

```html +parse
<x-gt-button text="Default" />
<x-gt-button text="Primary" class="primary"/>
<x-gt-button text="Secondary" class="secondary"/>
```

```html
<x-gt-button text="Default" />
<x-gt-button text="Primary" class="primary"/>
<x-gt-button text="Secondary" class="secondary"/>
```

### Button Icon

To include an icon, simply add the `icon` attribute and provide the Gotime icon name.

```html +parse
<x-gt-button text="Account" icon="user" />
<x-gt-button icon="user" />
```

```html
<x-gt-button text="Account" icon="user" />
```

<div class="txt-red">To create a button with only an icon, omit the <code>text</code> attribute. By default, the button will have a rectangular shape. Use utility classes to adjust its appearance as needed.</div>

### Icon Position

By default, the icon will appear to the left of the button’s text. To position the icon to
the right of the text, use the `iconPosition` attribute with a value of `right`.



```html
<x-gt-button text="Account" icon="user" />
<x-gt-button text="Account" icon="user" iconPosition="right" />
```
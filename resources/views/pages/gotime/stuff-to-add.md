form control information


## Component Composition

Under the hood, the Input component uses composition, to build form controls. This offers
greater flexibility, enabling you to customise and extend the input field to meet a wide
range of form requirements.

For more information on component composition and how it can be used to create flexible
and reusable components, refer to the [Control Composition and Design
Principles](/gotime/v2/form-control-composition-and-customisation) section.

<hr>


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
<!-- TOC -->

- [Component](#component)
- [Blade real-time validation with alpine input focus](#blade-real-time-validation-with-alpine-input-focus)

<!-- /TOC -->

<a id="markdown-component" name="component"></a>

### Component
```php
<?php

namespace App\Livewire;

use App\Models\Thing;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateThing extends Component
{
    public Thing $thing;
    public string $selected = '';

    #[Validate('required|email')]
    public string $email;

    public function mount()
    {
        $this->thing = Thing::find(1);
    }

    public function updated($name, $value)
    {
        $this->validate();

        $this->thing->update([
            $name => $value
        ]);

        $this->reset('selected');
        $this->dispatch('notify', 'Profile updated successfully');
    }

    public function setSelected($field)
    {
        $this->selected = $field;
    }

    public function resetSelected($field)
    {
        $this->validateOnly($field);
        $this->selected = '';
    }
}
```

<a id="markdown-blade-real-time-validation-with-alpine-input-focus" name="blade-real-time-validation-with-alpine-input-focus"></a>

### Blade real-time validation with alpine input focus

Create an Alpine.js component with a `selected` data property. This property corresponds to the
`$selected` property in your Livewire component.

Use the `x-on:click` directive to listen for a click event on the div that contains the message.
When the div is clicked, the `setSelected` method is invoked to update the `selected` property to
the name of the input field.

If the `$selected` property in your Livewire component matches the selected input field, then the
input field is shown. If not, the value of the input field is displayed.

```html
<div x-data="{ selected: '{{ $selected }}' }">
    @if ($selected == 'email')
        <x-gt-input wire:model="email" wire:blur="resetSelected('email')"
            x-ref="email" x-init="$refs.email.focus()"
            for="email" autocomplete="off"/>
    @else
        <div wire:click="setSelected('email')" class="txt-red ctrl-padding">{{ $email }}</div>
    @endif
</div>
```

Add a `wire:dirty` directive to the div that contains the message. The `wire:target` attribute
should be set to the name of the input field. This will make the message appear only when the
input field is dirty.

Add the `wire:dirty` directive to the div enclosing the message. This directive will make the
message visible only when the input field has been modified. The `wire:target` attribute should be
assigned the name of the input field to specify which field the `wire:dirty` directive is
monitoring.

```html
 <div wire:dirty wire:target="email" >
    <div class="flex va-c mt txt-muted">
        Changes will be saved as soon as you clear the field...
    </div>
</div>
```

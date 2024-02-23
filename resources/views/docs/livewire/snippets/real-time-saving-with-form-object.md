
## Form Object

```php
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public User $editing;

    #[Validate('required|email')]
    public string $email;

    public function setModel(User $user)
    {
        $this->editing = $user;
        $this->email = $this->editing->email;
    }

    public function saveField($name, $value)
    {
        // Remove the "form." prefix from the field name
        $name = str_replace('form.', '', $name);

        $this->editing->update([
            $name => $value,
        ]);
    }
}
```

## Component
```php
<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RealTimeSavingWIthFormObject extends Component
{
    public UserForm $form;
    public string $selected = '';

    public function mount()
    {
        $this->form->setModel(User::first());
    }

    public function updated($name, $value)
    {
        $this->validateOnly($name);
        $this->form->saveField($name, $value);
        $this->dispatch('notify', 'User updated successfully!');
    }

    public function setSelected(string $name): void
    {
        $this->selected = $name;
    }

    public function resetSelected()
    {
        // the validation is required to prevent the code from breaking
        $this->validate();
        $this->reset('selected');
    }

    public function render()
    {
        return <<<'HTML'
            <div x-data>
                @if ($selected == 'email')
                    <x-gt-input wire:model.blur="form.email" for="form.email"
                        x-ref="email"
                        x-init="$refs.email.focus()"
                        x-on:blur="$wire.resetSelected()"
                        autocomplete="off" />
                @else
                    <div wire:click="setSelected('email')" class="ctrl-padding">{{ $form->email }}</div>
                @endif
            </div>
        HTML;
    }
}
```

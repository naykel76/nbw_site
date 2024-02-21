<?php

/** =========================================================================
 * THIS EXAMPLE INCLUDES BOTH THE FORM OBJECT AND THE COMPONENT
 * ==========================================================================
 *
 */

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
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

    public function render()
    {
        return <<<'HTML'
            <div>
                <input wire:model.blur="form.email" autocomplete="off" />
                @error('form.email') <span class="error">{{ $message }}</span> @enderror
            </div>
        HTML;
    }
}


// <div class="bx pxy-025">
//     <div x-data="{ selected: '{{ $selected }}' }">
//         @if ($selected == 'email')
//             <input wire:model.blur="form.email"
//                 x-ref="email"
//                 x-init="$refs.email.focus()"
//                 x-on:blur="selected = '', $wire.selected=''"
//                 for="form.email" autocomplete="off" class="txt-orange" />
//         @else
//             <div wire:click="setSelected('email')" class="ctrl-padding">{{ $form->email }}</div>
//         @endif
//     </div>
// </div>


// <x-gt-input wire:model.blur="form.email"
// x-ref="email"
// x-init="$refs.email.focus()"
// x-on:blur="selected = '', $wire.selected=''"
// for="form.email" autocomplete="off" class="txt-orange" />

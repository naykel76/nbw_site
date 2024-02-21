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
        $this->validate();
        $this->form->editing->update([
            $name => $value
        ]);

        // why?????
        dd('Just by adding this the update is working as expected');

        $this->reset('selected');
        $this->dispatch('notify', 'Profile updated successfully');
    }

    public function setSelected(string $name): void
    {
        $this->selected = $name;
    }

    public function render()
    {
        return <<<'HTML'
            <div class="bx pxy-025">
                <div x-data="{ selected: '{{ $selected }}' }">
                    @if ($selected == 'email')
                        <input wire:model.blur="form.email"
                            x-ref="email"
                            x-init="$refs.email.focus()"
                            x-on:blur="selected = '', $wire.selected=''"
                            for="form.email" autocomplete="off" class="txt-orange" />
                    @else
                        <div wire:click="setSelected('email')" class="ctrl-padding">{{ $form->email }}</div>
                    @endif
                </div>
            </div>
        HTML;
    }
}



// <x-gt-input wire:model.blur="form.email"
// x-ref="email"
// x-init="$refs.email.focus()"
// x-on:blur="selected = '', $wire.selected=''"
// for="form.email" autocomplete="off" class="txt-orange" />

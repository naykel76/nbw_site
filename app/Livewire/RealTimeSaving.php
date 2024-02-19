<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RealTimeSaving extends Component
{
    public User $user;
    public string $selected = '';

    #[Validate('required|email')]
    public string $email;

    public function mount()
    {
        $this->user = auth()->user();
        $this->email = $this->user->email;
    }

    public function updated($name, $value)
    {
        $this->validate();

        $this->user->update([
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

    public function render()
    {
        return <<<'HTML'
        <div class="bx">
            <div x-data="{ selected: '{{ $selected }}' }">
                @if ($selected == 'email')
                    <x-gt-input wire:model="email" wire:blur="resetSelected('email')"
                        x-ref="email" x-init="$refs.email.focus()"
                        for="email" autocomplete="off"/>
                @else
                    <div wire:click="setSelected('email')" class="txt-red ctrl-padding">{{ $email }}</div>
                    <small class="ml-1">Select to edit</small>
                @endif
            </div>
        </div>
        HTML;
    }
}

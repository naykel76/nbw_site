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
        $this->user = User::first();
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
        <div class="bx pxy-025">
            <div x-data="{ selected: '{{ $selected }}' }">
                @if ($selected == 'email')
                    <x-gt-input wire:model="email" wire:blur="resetSelected('email')"
                        x-ref="email" x-init="$refs.email.focus()"
                        for="email" autocomplete="off" class="txt-orange" />
                @else
                    <div wire:click="setSelected('email')" class="ctrl-padding">{{ $email }}</div>
                @endif
            </div>
        </div>
        HTML;
    }
}

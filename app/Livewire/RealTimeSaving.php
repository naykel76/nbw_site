<?php

namespace App\Livewire;

use App\Models\Thing;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RealTimeSaving extends Component
{
    public Thing $thing;
    public string $selected = '';

    #[Validate('required|min:5')]
    public string $name;

    public function mount()
    {
        $this->thing = Thing::first();
        $this->name = $this->thing->name;
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

    public function render()
    {
        return <<<'HTML'
        <div class="bx">
            <div x-data="{ selected: '{{ $selected }}' }">
                @if ($selected == 'name')
                    <x-gt-input wire:model="name" wire:blur="resetSelected('name')"
                        x-ref="name" x-init="$refs.name.focus()"
                        for="name" autocomplete="off"/>
                @else
                    <div wire:click="setSelected('name')" class="txt-red ctrl-padding">{{ $name }}</div>
                    <small class="ml-1">Select to edit</small>
                @endif
            </div>
        </div>
        HTML;
    }
}

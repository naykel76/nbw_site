<?php

namespace App\Livewire\Cookbook;

use App\Livewire\Forms\UserFormForRealTimeSaving;
use App\Models\User;
use Livewire\Component;

class RealTimeSavingWithSelectableInputs extends Component
{
    public UserFormForRealTimeSaving $form;

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

    public function render()
    {
        return <<<'HTML'
            <div>
                <x-gt-input wire:model.blur="form.name" for="form.name" label="Name" inline/>
                <x-gt-input wire:model.blur="form.email" for="form.email" label="Email" inline/>
            </div>
        HTML;
    }
}

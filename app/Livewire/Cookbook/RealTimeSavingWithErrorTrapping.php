<?php

namespace App\Livewire\Cookbook;

use App\Livewire\Forms\UserFormForRealTimeSaving;
use App\Models\User;
use Livewire\Component;

class RealTimeSavingWithErrorTrapping extends Component
{
    public UserFormForRealTimeSaving $form;
    public string $selected = '';
    public bool $hasErrors = false;

    public function mount()
    {
        $this->form->setModel(User::first());
    }

    public function updated($name, $value)
    {
        try {
            $this->validateOnly($name);
            $this->hasErrors = false;
            $this->form->saveField($name, $value);
            $this->dispatch('notify', 'User updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->hasErrors = true;
            $this->selected = $name;
            throw $e;
        }
    }

    public function render()
    {
        return <<<HTML
            <div x-data="{ selectedField: \$wire.entangle('selected') }">
                <x-gt-input wire:model.blur="form.name" label="name"
                    x-bind:disabled="\$wire.hasErrors && selectedField !== 'form.name'" />
                <x-gt-input type="email" wire:model.blur="form.email" label="email"
                    x-bind:disabled="\$wire.hasErrors && selectedField !== 'form.email'" />
            </div>
        HTML;
    }
}

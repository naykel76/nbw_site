<?php

namespace App\Livewire\Gotime\Components;

use Livewire\Component;

class Radio extends Component
{
    public $options = ['yes' => 'Yes', 'no' => 'No', 'maybe' => 'Maybe'];

    // public $selected = 'pink';

    public $receiveEmails = false;

    // public $withError = false;

    public function mount()
    {
        $this->addError('receiveEmails', 'The is a radio input error for testing.');
    }

    public function render()
    {
        return <<<'blade'
            <x-gt-radio wire:model="receiveEmails" :$options label="Receive Emails?" />
        blade;
    }
}

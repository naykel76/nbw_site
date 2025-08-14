<?php

namespace App\Livewire\Gotime\Components;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class Checkbox extends Component
{
    public string $variant = 'base';
    public string $markup;
    public bool $remember = false;
    public bool $newsLetter = true;
    public bool $events = false;
    // NKTD: add checkbox group

    public function mount()
    {
        $this->markup = $this->resolveVariant($this->variant);
        $this->addError('errorTest', 'Whoops! Something went wrong.');
    }

    private function resolveVariant(string $variant)
    {
        return match ($variant) {
            'control-group' => ' 
                <x-gt-checkbox wire:model="remember" label="Remember Me" />
             ',

            default => '<div class="yellow">THERE IS NO <span class="txt-red">{{ $variant }}</span> VARIANT FOR THIS SELECT COMPONENT</div>',
        };
    }

    public function render()
    {
        return Blade::render(<<<'blade'
            <div>
                {!! $markup !!}
            </div>
        blade, ['markup' => $this->markup]);
    }
}

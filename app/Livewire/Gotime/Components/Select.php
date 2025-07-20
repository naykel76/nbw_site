<?php

namespace App\Livewire\Gotime\Components;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class Select extends Component
{
    public string $variant = 'base';
    public string $markup;
    public string $size = '';
    public array $sizes = [
        'sm' => 'Small',
        'md' => 'Medium',
        'lg' => 'Large',
    ];
    public string $country = 'CA';
    public array $countries = [
        'AU' => 'Australia',
        'CA' => 'Canada',
        'NZ' => 'New Zealand',
        'UK' => 'United Kingdom',
        'US' => 'United States',
    ];

    public function mount()
    {
        $this->markup = $this->resolveVariant($this->variant);
        $this->addError('errorTest', 'Whoops! Something went wrong.');
    }

    private function resolveVariant(string $variant)
    {
        return match ($variant) {
            'control-group' => '
                <x-gt-select wire:model="country" :options="$countries" />
            ',
            'control-group-multi-select' => '
                <x-gt-select wire:model="country" :options="$countries" multiple />
            ',
            'control-group-with-error' => '
                <x-gt-select wire:model="errorTest" :options="$countries" />
            ',
            'control-only' => '
                <x-gotime::v2.input.controls.select wire:model="country" :options="$countries" />
            ',
            'control-only-with-error' => '
                <x-gotime::v2.input.controls.select wire:model="errorTest" :options="$countries" />
            ',
            default => '<div>THERE IS NO <span class="txt-red">{{ $variant }}</span> VARIANT FOR THIS SELECT COMPONENT</div>',
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

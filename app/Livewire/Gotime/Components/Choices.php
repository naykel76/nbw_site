<?php

namespace App\Livewire\Gotime\Components;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class Choices extends Component
{
    public string $variant = 'base';
    public string $markup;
    public $options = [];
    public $selections = [];
    public array $tags = [
        1 => 'Artistic',
        2 => 'Fashion',
        3 => 'Fitness',
        4 => 'Music',
        5 => 'Photography',
        6 => 'Technology',
        7 => 'Travel',
    ];
    public $selectedTags = [2, 4, 5];

    public function mount()
    {
        $this->markup = $this->resolveVariant($this->variant);
        $this->addError('errorTest', 'Whoops! Something went wrong.');
    }

    private function resolveVariant(string $variant)
    {
        return match ($variant) {
            'control-group' => '
                <x-gt-choices wire:model="selectedTags" :options="$tags" />
            ',
            'control-group-disabled' => '
                <x-gt-choices wire:model="selectedTags" :options="$tags" disabled/>
            ',
            'control-group-with-error' => '
                <x-gt-choices wire:model="errorTest" :options="$tags"/>
            ',

            // 'control-only' => '
            //     <x-gotime::v2.input.controls.choices wire:model="country" :options="$countries" />
            // ',
            //         'control-only-with-error' => '
            //             <x-gotime::v2.input.controls.select wire:model="errorTest" :options="$countries" />
            //         ',
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

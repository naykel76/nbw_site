<?php

namespace App\Livewire\Gotime\Components;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class Input extends Component
{
    public string $variant;
    public string $markup;

    public function mount()
    {
        $this->addError('errorTest', 'Whoops! The username has already been taken.');
        $this->markup = $this->resolveVariant($this->variant);
    }

    private function resolveVariant(string $variant)
    {
        return match ($variant) {
            'control-group' => ' 
                <x-gt-input wire:model="name" placeholder="Enter your name..." />
            ',
            'control-group-with-error' => ' 
                <x-gt-input wire:model="errorTest" placeholder="Enter your name..." />
            ',
            'control-only' => ' 
                <x-gotime::v2.input.controls.input wire:model="name" placeholder="Enter your name..." />
            ',
            'control-only-with-error' => ' 
                <x-gotime::v2.input.controls.input wire:model="errorTest" placeholder="Enter your name..." />
            ',
            // these are the variations and extras that can be used in the input component
            "with-label" => '
                <x-gt-input wire:model="name" placeholder="Enter your name... label="Name" />
            ',
            // "input-with-help-text-bottom" => '
            //     <x-gt-input wire:model="url"  rowClass="mb "
            //         helpText="Enter a valid URL including http:// or https://"/>
            // ',
            // "input-with-help-text-top" => '
            //     <x-gt-input wire:model="url" helpTextTop
            //         helpText="Enter a valid URL including http:// or https://"/>
            // ',
            // "input-with-error" => '
            //     <x-gt-input wire:model="username" placeholder="Jimbo427" />
            // ',
            // "input-with-control-only" => '
            //     <x-gt-input wire:model="name" placeholder="Enter your name... controlOnly />
            // ',
            // "input-with-label-and-tooltip" => '
            //     <x-gt-input wire:model="body" label="Your Message">
            //         <x-slot name="tooltip" class="danger">
            //             <span class="txt-3"> 👌 </span>
            //         </x-slot>
            //     </x-gt-input>
            // ',
            default => '
                <div>THERE IS NO <span class="txt-red">{{ $variant }}</span> VARIANT FOR THIS SELECT COMPONENT</div>
            ',
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

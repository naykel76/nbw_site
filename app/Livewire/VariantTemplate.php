<?php

namespace App\Livewire\Gotime\Components;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class Modal extends Component
{
    public string $variant;
    public string $markup;

    public function mount()
    {
        $this->markup = $this->resolveVariant($this->variant);
    }

    private function resolveVariant(string $variant)
    {
        return match ($variant) {
            'control-group' => ' 
            
            ',
            'control-group-with-error' => ' 
            
            ',
            'control-only' => ' 
            
            ',
            'control-only-with-error' => ' 
            
            ',
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

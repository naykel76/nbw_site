<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class FileUploadExamples extends Component
{
    // rename
    // rename with specific format
    // add timestamp
    // add prefix

    public string $variant = 'base';
    public string $markup;

    public function mount()
    {
        $this->markup = $this->resolveVariant($this->variant);
    }

    private function resolveVariant(string $variant)
    {
        return match ($variant) {
            'base' => '
       
            ',
            'dialog' => '
     
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

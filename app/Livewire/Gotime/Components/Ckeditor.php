<?php

namespace App\Livewire\Gotime\Components;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class Ckeditor extends Component
{
    public string $variant;
    public string $markup;
    public string $body;
    public string $fieldWithError;

    public function mount()
    {
        // $this->addError('fieldWithError', 'Whoops! There is an error.');

        $this->markup = $this->resolveVariant($this->variant);
    }

    private function resolveVariant(string $variant)
    {
        return match ($variant) {
            'classic-control-only-basic' => "
                <x-gotime::v2.input.controls.ckeditor
                    wire:model.blur=\"body\" editorId=\"{{ '_' . Str::uuid() }}\"
                    editorType=\"classic\" editorConfig=\"basic\" />
            ",
            'classic-control-only-standard' => "
                <x-gotime::v2.input.controls.ckeditor
                    wire:model.blur=\"body\" editorId=\"{{ '_' . Str::uuid() }}\"
                    editorType=\"classic\" editorConfig=\"standard\" />
            ",
            'balloon-control-only-basic' => "
                <x-gotime::v2.input.controls.ckeditor
                    wire:model.blur=\"body\" editorId=\"{{ '_' . Str::uuid() }}\"
                    editorType=\"balloon\" editorConfig=\"basic\" />
            ",
            'balloon-control-only-standard' => "
                <x-gotime::v2.input.controls.ckeditor
                    wire:model.blur=\"body\" editorId=\"{{ '_' . Str::uuid() }}\"
                    editorType=\"balloon\" editorConfig=\"standard\" />
            ",
            'classic-control-group-basic' => "
                <x-gt-ckeditor wire:model.blur=\"body\" editorId=\"{{ '_' . Str::uuid() }}\"
                    editorType=\"classic\" editorConfig=\"basic\" />
            ",
            'classic-control-group-standard' => "
                <x-gt-ckeditor wire:model.blur=\"body\" editorId=\"{{ '_' . Str::uuid() }}\"
                    editorType=\"classic\" editorConfig=\"standard\" />
            ",
            'balloon-control-group-basic' => "
                <x-gt-ckeditor wire:model.blur=\"body\" editorId=\"{{ '_' . Str::uuid() }}\"
                    editorType=\"balloon\" editorConfig=\"basic\" />
            ",
            'balloon-control-group-standard' => "
                <x-gt-ckeditor wire:model.blur=\"body\" editorId=\"{{ '_' . Str::uuid() }}\"
                    editorType=\"balloon\" editorConfig=\"standard\" />
            ",
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

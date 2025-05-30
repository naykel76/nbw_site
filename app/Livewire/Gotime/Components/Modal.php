<?php

namespace App\Livewire\Gotime\Components;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class Modal extends Component
{
    public string $variant = 'base';
    public string $markup;
    public bool $showBaseModal = false;
    public bool $showDialogModal = false;
    public bool|int $selectedId = false;
    public string $type = 'base';

    public function mount()
    {
        $this->markup = $this->resolveVariant($this->variant);
    }

    private function resolveVariant(string $variant)
    {
        return match ($variant) {
            'base' => "
                <x-gt-button.primary wire:click=\"\$toggle('showBaseModal')\" text=\"Open Base Modal\"/>
                <x-gt-modal wire:model=\"showBaseModal\">
                    This is the base modal!
                </x-gt-modal>
            ",
            'dialog' => "
                <x-gt-button.primary wire:click=\"\$toggle('showDialogModal')\" text=\"Open Dialog Modal\"/>
                <x-gt-modal.dialog wire:model=\"showDialogModal\">
                    This is the dialog modal!
                </x-gt-modal.dialog>
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

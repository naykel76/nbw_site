<?php

namespace App\Livewire\Gotime\Components;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Livewire\WithFileUploads;

class Filepond extends Component
{
    // protected $storage = ['disk' => 'videos', 'dbColumn' => 'file_name', 'path' => ''];

    use WithFileUploads;

    public string $variant = 'base';
    public string $markup;
    public $tmpUpload;

    public function mount()
    {
        $this->markup = $this->resolveVariant($this->variant);
    }

    public function clearTmpUpload()
    {
        $this->reset('tmpUpload');
    }

    private function resolveVariant(string $variant)
    {
        return match ($variant) {
            'base' => '
       
            ',
            'video' => '
                <x-gt-filepond wire:model="tmpUpload" type="video" maxFileSize="150000" />
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

// <x-gt-filepond wire:model="form.tmpUpload" type="file" />

// ----------

//

// <div>
// @if ($displayError)
//     <x-gt-filepond wire:model="errorTest" for="errorTest" />
// @elseif ($displayAll)
//     <x-gt-filepond wire:model="image" for="image" label="FilePond" helpText="FilePond help text">
//         <x-slot name="tooltip">
//             Select your file
//         </x-slot>
//     </x-gt-filepond>
// @else
//     <x-gt-filepond wire:model="image" for="image" />
// @endif
// </div>

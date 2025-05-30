<?php

namespace App\Livewire\Gotime\Components;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class Datepicker extends Component
{
    public User $user;
    public $selectedDate;
    public string $variant;
    public string $markup;

    public function mount()
    {
        $this->user = User::first();
        $this->selectedDate = $this->user->created_at;

        // $this->addError('created_at', 'Whoops! The username has already been taken.');
        $this->markup = $this->resolveVariant($this->variant);
    }

    private function resolveVariant(string $variant)
    {
        return match ($variant) {
            'basic-input' => "
                <x-gt-datepicker wire:model='started_at' label='Default DatePicker' />
            "
            // 'input-with-label' => "
            //     <x-gt-input wire:model='email' placeholder='name@example.com' label='Your Email' />
            // ",
            // 'input-with-error' => "
            //     <x-gt-input wire:model='username' placeholder='Jimbo427' />
            // ",
            // 'input-with-control-only' => "
            //     <x-gt-input wire:model='email' placeholder='name@example.com' controlOnly />
            // ",
            // 'input-with-label-and-tooltip' => "
            //     <x-gt-input wire:model='body' label='Your Message'>
            //         <x-slot name='tooltip' class='danger'>
            //             <span class='txt-3'> 👌 </span>
            //         </x-slot>
            //     </x-gt-input>
            // ",

            // default => "<x-gt-input wire:model='email' placeholder='name@example.com' />",
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

    // public function render()
    // {
    //     return <<<'BLADE'
    //         <div>
    //             <h2>Control Only</h2>
    //             <div><strong>Date: </strong>{{ $selectedDate }}</div>

    //             <input x-data x-ref="datePickerInput" wire:model.blur="selectedDate"
    //                 x-init="flatpickr($refs.datePickerInput, {
    //                     dateFormat: 'd-m-Y',
    //                     onChange: (selectedDates, dateStr) => {
    //                         $dispatch('input', dateStr);
    //                     } })" type="text">
    //                 @once
    //                     @push('styles')
    //                         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    //                     @endpush
    //                     @push('scripts')
    //                         <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    //                     @endpush
    //                 @endonce
    //         </div>
    //     BLADE;
    // }
}

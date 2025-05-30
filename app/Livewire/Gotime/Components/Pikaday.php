<?php

namespace App\Livewire\Gotime\Components;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Pikaday extends Component
{
    public User $user;
    public $selected = '';

    #[Validate('date|required')]
    public $created_at;

    public $name;

    public function mount()
    {
        // dd(Carbon::parse('2021-10-10'));
        $this->user = User::first();
        $this->created_at = $this->user->created_at->format('d-m-Y');
    }

    public function updatedCreatedAt()
    {
        $this->user->forceFill([
            'created_at' => Carbon::parse($this->created_at),
        ])->save();

        $this->dispatch('notify', 'Updated successfully');
        $this->mount();
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            <x-gt-pikaday wire:model.blur="created_at" for="created_at" autocomplete="off" />
        </div>
        HTML;
    }
}

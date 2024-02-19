<?php

namespace App\Livewire;

use App\Models\Thing;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DragAndDropSorting extends Component
{
    public array $things;

    public function mount()
    {
        $this->things = Thing::orderBy('sort_order')->get()->toArray();
    }

    public function reOrder(array $orderedIds)
    {
        $this->things = collect($orderedIds)->map(function ($id) {
            return collect($this->things)->where('id', (int) $id)->first();
        })->toArray();

        // Thing::upsert($this->things, ['id'], ['sort_order']);
    }
}

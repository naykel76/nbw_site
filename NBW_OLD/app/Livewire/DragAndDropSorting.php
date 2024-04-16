<?php

namespace App\Livewire;

use App\Models\Thing;
use Livewire\Component;

class DragAndDropSorting extends Component
{
    public array $things;

    public array $tasks;

    // uses the livewire plugin to make the list sortable
    public bool $withPlugin = false;

    public function mount()
    {
        $this->things = Thing::orderBy('sort_order')->get()->toArray();
        $this->tasks = Thing::orderBy('sort_order')->get()->toArray();
    }

    public function reOrder(array $orderedIds)
    {
        $this->things = collect($orderedIds)->map(function ($id) {
            return collect($this->things)->where('id', (int) $id)->first();
        })->toArray();

        // DOES NOT PERSIST YET!

        // Thing::upsert($this->things, ['id'], ['sort_order']);
    }


    public function updateTaskOrder($orderedIds)
    {
        foreach ($orderedIds as $item) {
            \App\Models\Thing::find($item['value'])->update(['sort_order' => $item['order']]);
        }
        $this->tasks = Thing::orderBy('sort_order')->get()->toArray();
    }

    public function render()
    {
        if (!$this->withPlugin) {
            return view('livewire.drag-and-drop-sorting');
        }

        return <<<'HTML'
        <div>
            <h4>Sortable Plugin</h4>
            <div wire:sortable="updateTaskOrder">
                @foreach ($tasks as $task)
                    <div wire:sortable.item="{{ $task['id'] }}" wire:key="task-{{ $task['id'] }}"
                        class="flex va-c bx mt-025 dark rounded-05 pxy-075">
                        <div wire:sortable.handle class="cursor-move pxy-025 mr-05">
                            <x-gt-icon name="drag-vertical" class="wh-1" />
                        </div>
                        <div>{{ $task['name'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        HTML;
    }
}

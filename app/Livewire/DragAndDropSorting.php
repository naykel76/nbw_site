<?php

namespace App\Livewire;

use App\Models\Thing;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DragAndDropSorting extends Component
{
    public array $things;

    public array $tasks;

    // public array $tasks = [
    //     ['id' => 10, 'name' => 'Buy groceries'],
    //     ['id' => 20, 'name' => 'Finish report'],
    //     ['id' => 30, 'name' => 'Call the bank'],
    //     ['id' => 40, 'name' => 'Clean the house'],
    //     ['id' => 50, 'name' => 'Prepare for the meeting'],
    //     ['id' => 60, 'name' => 'Pay utility bills'],
    // ];

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


// <ul wire:sortable="updateTaskOrder" style="list-style: none;">
//     @foreach ($tasks as $task)
//         <li wire:sortable.item="{{ $task['id'] }}" wire:key="task-{{ $task['id'] }}"
//             class="flex space-between fg1 fs0 bx dark rounded-05 pxy-075">
//         <div>
//                 <div>{{ $task['name'] }}</div>
//                 <div wire:sortable.handle><x-gt-icon name="squares-2x2" class="cursor-pointer"/></div>
//             </div>
//         </li>
//     @endforeach
// </ul>

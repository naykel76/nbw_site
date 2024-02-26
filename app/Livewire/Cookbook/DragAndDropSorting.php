<?php

namespace App\Livewire\Cookbook;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DragAndDropSorting extends Component
{
    public Collection $courses;
    protected $model = Course::class;

    public function mount()
    {
        $this->loadItems();
    }

    public function loadItems()
    {
        $this->courses = $this->model::orderBy('sort_order')->get();
    }

    public function updateSortOrder(array $orderedIds): void
    {
        foreach ($orderedIds as $item) {
            $id = $item['value'];
            $this->model::find($id)->update(['sort_order' => $item['order']]);
        }
        $this->loadItems();
        $this->dispatch('notify', 'Module order updated');
    }

    public function render()
    {
        return <<<'HTML'
            <div wire:sortable="updateSortOrder" class="divide-y">
                @foreach ($courses as $course)
                    <div wire:sortable.item="{{ $course->id }}" wire:key="course-{{ $course->id }}">
                        <div class="flex va-c">
                            <div wire:sortable.handle class="cursor-move pxy-025 mr-05 opacity-05">
                                <x-gt-icon name="drag-vertical" class="wh-1" />
                            </div>
                            <div>{{ $course->title }} </div>
                        </div>
                    </div>
                @endforeach
            </div>
        HTML;
    }
}

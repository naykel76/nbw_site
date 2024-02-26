<?php

namespace App\Livewire\Cookbook;

use App\Livewire\Forms\CourseFormForInlineCrud;
use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DragAndDropSortingWithInlineEditing extends Component
{
    public CourseFormForInlineCrud $form;
    public Collection $courses;

    protected $model = Course::class;
    public bool $isCreateMode = false;

    public function mount()
    {
        $this->loadItems();
    }

    public function edit(int $id): void
    {
        $this->resetErrorBag();
        $this->form->setModel($this->model::findOrFail($id));
    }

    public function save()
    {
        $validatedData = $this->validate();
        $this->model::updateOrCreate(['id' => $this->form->getEditingModel()->id], $validatedData);
        $this->dispatch('item-saved');
        $this->dispatch('notify', 'Course updated successfully!');
        $this->reset();
        $this->loadItems();
    }

    public function updateSortOrder(array $orderedIds): void
    {
        foreach ($orderedIds as $item) {
            $id = $item['value'];
            $this->model::find($id)->update(['sort_order' => $item['order']]);
        }
        $this->loadItems();
        $this->dispatch('notify', 'Order updated');
    }

    public function loadItems()
    {
        $this->courses = $this->model::orderBy('sort_order')->get();
    }

    public function render()
    {
        return <<<'HTML'
            <div wire:sortable="updateSortOrder" class="space-y-0">
                @foreach ($courses as $course)
                    @if (isset($form->editing) && $form->editing->id == $course->id)
                        @include('livewire.cookbook.list-with-inline-crud-row')
                    @else
                        <div wire:sortable.item="{{ $course->id }}" wire:key="course-{{ $course->id }}">
                            <div class="flex va-c">
                                <div wire:sortable.handle class="cursor-move pxy-025 mr-05 opacity-05">
                                    <x-gt-icon name="drag-vertical" class="wh-1" />
                                </div>
                                <div class="flex space-between control-padding fg1">
                                    {{ $course->title }}
                                    <a class="transparent-on-drag" wire:click="edit({{ $course->id }})">Edit</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        HTML;
    }
}

<?php

namespace App\Livewire\Cookbook;

use App\Livewire\Forms\CourseFormForInlineCrud;
use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

#[On('item-saved')]
class ListWithInlineCrud extends Component
{
    public CourseFormForInlineCrud $form;
    public Collection $courses;

    protected $model = Course::class;
    public string $selected = '';

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function edit(int $id): void
    {
        if (!isset($this->model)) {
            throw new \Exception('Property $model is not set in ' . __CLASS__ . ". ---- Eg. protected \$model = Model::class;");
        }
        $this->resetErrorBag();
        $this->selected = 'title';
        $this->form->setModel($this->model::findOrFail($id));
    }

    public function save()
    {
        $validatedData = $this->validate();
        $this->form->getEditingModel()->update($validatedData);
        $this->dispatch('item-saved');
        $this->dispatch('notify', 'Course updated successfully!');
        $this->cancel();
    }

    public function cancel()
    {
        $this->form->reset('editing');
    }

    public function render()
    {

        return <<<HTML
            <div class="space-y-0">
                @foreach (\$courses as \$course)
                    @if (isset(\$form->editing) && \$form->editing->id == \$course->id)
                        <div class="flex gap-05 va-t">
                            <x-gt-input wire:model="form.code" class="w-6" />
                            <x-gt-input wire:model="form.title" rowClass="fg1" />
                            <x-gt-button wire:click="save" text="save" class="pink" />
                            <x-gt-button wire:click="cancel" text="cancel" />
                        </div>
                    @else
                        <div class="control-padding">
                            <a wire:click="edit({{ \$course->id }})">{{ \$course->title }}</a>
                        </div>
                    @endif
                @endforeach
            </div>
        HTML;
    }
}

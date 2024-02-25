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
    public bool $isCreateMode = false;

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function create()
    {
        $this->isCreateMode = true;
        $this->form->setModel(new Course());
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
        $this->model::updateOrCreate(['id' => $this->form->getEditingModel()->id], $validatedData);
        $this->dispatch('item-saved');
        $this->dispatch('notify', 'Course updated successfully!');
        $this->resetActions();
        $this->courses = Course::all();
    }

    public function resetActions()
    {
        $this->reset('isCreateMode', 'selected');
        $this->form->reset('editing');
    }

    public function render()
    {
        return view('livewire.cookbook.list-with-inline-crud', [
            'courses' => $this->courses
        ]);
    }
}

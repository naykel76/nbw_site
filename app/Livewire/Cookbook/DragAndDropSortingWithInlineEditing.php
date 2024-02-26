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
    public string $selected = '';
    public bool $isCreateMode = false;

    public function mount()
    {
        $this->loadItems();
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
        $this->loadItems();
    }

    public function resetActions()
    {
        $this->reset('isCreateMode', 'selected');
        $this->form->reset('editing');
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
        return view('livewire.play', [
            'courses' => $this->courses,
        ]);

        return <<<'HTML'

        HTML;
    }
}

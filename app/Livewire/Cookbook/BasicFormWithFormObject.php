<?php

namespace App\Livewire\Cookbook;

use App\Models\Course;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Form;
use Naykel\Gotime\Traits\Crudable;
use Naykel\Gotime\Traits\Formable;

class CourseForm extends Form
{
    use Formable;

    #[Validate('required|max:255')]
    public string $title;

    public function setModel(Course $course): void
    {
        $this->editing = $course;
        $this->title = $this->editing->title ?? '';
    }
}

class BasicFormWithFormObject extends Component
{
    use Crudable;

    public CourseForm $form;

    protected $modelClass = Course::class;

    public function mount(Course $course)
    {
        $model = $course->id ? $course : new Course;
        $this->form->setModel($model);
    }

    public function render()
    {
        return <<<HTML
            <form wire:submit="save">
                <div class="flex gap">
                    <x-gt-input wire:model="form.title" for="form.title" rowClass="fg1" autocomplete="off"/>
                    <x-gt-button wire:click="save" class="pink self-stat" text="Save" />
                </div>
            </form>
        HTML;
    }
}

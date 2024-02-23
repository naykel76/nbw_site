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

    protected $model = Course::class;

    public function mount(Course $course)
    {
        $model = $course->id ? $course : new Course;
        $this->form->setModel($model);
    }

    public function render()
    {
        return view('livewire.cookbook.basic-form-with-form-object');
    }
}

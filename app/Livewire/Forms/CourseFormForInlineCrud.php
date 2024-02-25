<?php

namespace App\Livewire\Forms;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CourseFormForInlineCrud extends Form
{
    public ?Course $editing;

    #[Validate('required|min:6|max:255')]
    public string $title;
    #[Validate('required')]
    public string $code;

    public function setModel(Course $course)
    {
        $this->editing = $course;
        $this->title = $this->editing->title ?? '';
        $this->code = $this->editing->code ?? '';
    }

    public function getEditingModel(): bool|Model
    {
        return $this->editing ?? false;
    }
}

<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Naykel\Gotime\Traits\Crudable;
use Naykel\Gotime\Traits\Formable;
use Illuminate\Support\Str;

class UserProfileFormObject extends Form
{
    use Crudable, Formable;

    #[Validate('required|string|max: 255')]
    public string $name;

    // #[Validate('nullable|string')]
    // public string $bio;

    // #[Validate('nullable|array')]
    // public string|array $tags = []; // string is to allow setFormProperties to work

    // #[Validate('nullable|array')]
    // public string|array $hobbies = []; // string is to allow setFormProperties to work

    public function init(User $model): void
    {
        $this->editing = $model;
        $this->setFormProperties($this->editing);
        // $this->tags = $model->tags ?? [];
        // $this->hobbies = $model->hobbies ?? [];
        $this->name = Str::title($this->name);
    }

    public function createNewModel(array $data = []): User
    {
        return User::make(array_merge([
            'name' => 'Initial Value Defined in the Form Object',
        ], $data));
    }
}

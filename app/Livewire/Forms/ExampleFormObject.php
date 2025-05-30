<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Naykel\Gotime\Traits\Crudable;
use Naykel\Gotime\Traits\Formable;

class ExampleFormObject extends Form
{
    use Crudable, Formable;

    #[Validate('required|string|max: 255')]
    public string $name;

    #[Validate('nullable|string')]
    public string $bio;
    
    public string $country = 'UK'; // not hooked up to the form yet

    public function init(User $model): void
    {
        $this->editing = $model;
        $this->setFormProperties($this->editing);

        // Override properties if needed
        $this->name = Str::title($this->name);
    }

    public function createNewModel(array $data = []): User
    {
        return User::make(array_merge([
            'name' => 'Initial Value Defined in the Form Object',
        ], $data));
    }
}

// use Crudable, Formable;

// public string $first_name;
// // public string $birthday;

// protected function rules()
// {
//     return [
//         'first_name' => 'required|string|max:64',
//         'bio' => 'string',
//         // 'birthday' => 'date',
//     ];
// }

// public function init(User $user): void
// {
//     $this->editing = $user;
//     $this->setFormProperties($this->editing);
//     // $this->birthday = $user->birthday ?? null;
// }

<?php

namespace App\Livewire\Forms;

use App\Models\Widget;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Naykel\Gotime\Traits\Crudable;
use Naykel\Gotime\Traits\Formable;

class WidgetFormObject extends Form
{
    use Crudable, Formable;

    #[Validate('required|string|max: 255')]
    public string $title;

    public function init(Widget $model): void
    {
        $this->editing = $model;
        $this->setFormProperties($this->editing);
    }

    //     #[Validate('required|string|max:255')]
    //     public string $name;

    //     public string $email;

    //     #[Validate('sometimes|string|min:8|max:255')]
    //     public ?string $password = null;

    //     #[Validate('sometimes|date|after_or_equal:today')]
    //     public ?string $email_verified_at;

    //     public function rules(): array
    //     {
    //         return [
    //             'email' => 'required|string|email|max:255|unique:users,email,' . $this->editing->id,
    //         ];
    //     }

    //     // 'phone' => 'nullable|string|regex:/^[0-9+\s]+$/i|min:10',

    //     // #[Validate('nullable|string')]
    //     // public string $bio;

    //     // #[Validate('nullable|array')]
    //     // public string|array $tags = []; // string is to allow setFormProperties to work

    //     // #[Validate('nullable|array')]
    //     // public string|array $hobbies = []; // string is to allow setFormProperties to work

    //     public function init(User $model): void
    //     {
    //         $this->editing = $model;
    //         $this->setFormProperties($this->editing);

    //         // $this->email_verified_at = $model->email_verified_at ?? now();
    //         $this->email_verified_at = $model->email_verified_at ?? now();
    //         // $this->tags = $model->tags ?? [];
    //         // $this->hobbies = $model->hobbies ?? [];
    //         // $this->name = Str::title($this->name);
    //     }

    //     public function createNewModel(array $data = []): User
    //     {
    //         return User::factory()->make($data);

    //         return User::make(array_merge([
    //             'email_verified_at' => now(),
    //             'password' => Hash::make(Str::random(10)),
    //         ], $data));
    //     }

}

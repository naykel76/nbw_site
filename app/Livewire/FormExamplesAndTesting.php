<?php

namespace App\Livewire;

use App\Livewire\Forms\ExampleFormObject;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\WithFormActions;

class FormExamplesAndTesting extends Component
{
    use Renderable, WithFileUploads, WithFormActions;

    public ExampleFormObject $form;

    public array $countries = [
        'AU' => 'Australia',
        'CA' => 'Canada',
        'NZ' => 'New Zealand',
        'UK' => 'United Kingdom',
        'US' => 'United States',
    ];

    public array $tags = [
        'Artistic',
        'Fashion',
        'Fitness',
        'Music',
        'Photography',
        'Technology',
        'Travel',
    ];

    public function mount()
    {
        $this->form->init(User::first());
    }

    public function render()
    {
        return view('livewire.form-select-dropdown-and-checkboxes');
    }
}

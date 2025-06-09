<?php

namespace App\Livewire;

use App\Livewire\Forms\ExampleFormObject;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\WithFormActions;

class ExampleForm extends Component
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
        1 => 'Artistic',
        2 => 'Fashion',
        3 => 'Fitness',
        4 => 'Music',
        5 => 'Photography',
        6 => 'Technology',
        7 => 'Travel',
    ];

    public $selectedTags = [2, 4, 5];
    
    public function mount()
    {
        // no need to mount. used for testing
        $this->form->init(User::first());
    }
}

// get save to dispatch an event to tell the parent component (list) to update

// #[on('create-item')]
// public function callCreate()
// {
//     $this->create();
// }

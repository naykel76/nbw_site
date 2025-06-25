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



    public array $hobbies = ['guitar', 'gaming', 'coding', 'cooking', 'traveling'];

    public function mount()
    {
        // no need to mount. used for testing
        $this->form->init(User::first());
    }

    public function doStuff()
    {
        dd($this->form);
    }
}

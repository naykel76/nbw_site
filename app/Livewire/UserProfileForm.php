<?php

namespace App\Livewire;

use App\Livewire\Forms\UserProfileFormObject;
use App\Models\User;
use Livewire\Component;
use Naykel\Gotime\Traits\WithFormActions;

class UserProfileForm extends Component
{
    use WithFormActions;

    public UserProfileFormObject $form;
    protected string $modelClass = User::class;

    public function mount()
    {
        $this->form->init(User::first());
    }

    public function render()
    {
        return view('livewire.user-profile-form');
    }
}

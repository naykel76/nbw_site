<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserFormForRealTimeSaving extends Form
{
    public User $user;

    #[Validate('required')]
    public string $name;
    #[Validate('required|email')]
    public string $email;

    public function setModel(User $user)
    {
        $this->user = $user;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function saveField($name, $value)
    {
        // Remove the "form." prefix from the field name
        $name = str_replace('form.', '', $name);

        $this->user->update([
            $name => $value,
        ]);
    }
}

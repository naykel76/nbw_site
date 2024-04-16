<?php

namespace App\Livewire\Cookbook;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BasicForm extends Component
{
    protected $model = Course::class;
    public Model $editing;

    #[Validate('required|max:255')]
    public string $title;

    public function mount(Course $course)
    {
        $this->editing = $course;
        $this->title = $this->editing->title ?? '';
    }

    public function save()
    {
        $this->validate();
    }

    public function render()
    {
        return <<<HTML
            <form wire:submit="save">
                <div class="flex gap">
                    <x-gt-input wire:model="title" for="title" rowClass="fg1" autocomplete="off"/>
                    <x-gt-button wire:click="save" class="pink self-stat" text="Save" />
                </div>
            </form>
        HTML;
    }
}

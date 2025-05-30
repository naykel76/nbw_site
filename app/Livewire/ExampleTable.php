<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\Sortable;

class ExampleTable extends Component
{
    use Renderable, Sortable, WithPagination;

    protected string $modelClass = User::class;
    public string $pageTitle = 'User Table';

    protected function prepareData()
    {
        $query = $this->modelClass::query();
        $query = $this->applySorting($query);

        return ['items' => $query->paginate(20)];
    }
}

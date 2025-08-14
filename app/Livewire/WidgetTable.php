<?php

namespace App\Livewire;

use App\Models\Widget;
use Livewire\Component;
use Livewire\WithPagination;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\Sortable;

class WidgetTable extends Component
{
    use Renderable, Sortable, WithPagination;

    protected string $modelClass = Widget::class;
    public string $pageTitle = 'Widget Table';
    // public $routePrefix = '';

    protected function prepareData()
    {
        $query = $this->modelClass::query();
        $query = $this->applySorting($query);

        return ['items' => $query->paginate(4)];
    }
}

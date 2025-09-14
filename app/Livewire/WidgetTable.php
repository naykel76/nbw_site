<?php

namespace App\Livewire;

use App\Models\Widget;
use Livewire\Attributes\On;
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

    #[On('model-saved')]
    public function refreshComponent()
    {
        $this->resetPage();
    }

    protected function prepareData()
    {
        $query = $this->modelClass::query();
        $query = $this->applySorting($query);

        return ['items' => $query->paginate(8)];
    }
}

<?php

namespace App\Livewire\Cookbook;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Naykel\Gotime\Traits\Sortable;

class DataTableBasic extends Component
{
    use WithPagination;
    use Sortable;

    public function render()
    {
        $query = Course::query();
        $query = $this->applySorting($query);

        return view('livewire.cookbook.data-table-basic', [
            'courses' => $query->paginate(3),
        ]);
    }
}

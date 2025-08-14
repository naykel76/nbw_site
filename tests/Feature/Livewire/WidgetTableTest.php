<?php

use App\Livewire\WidgetTable;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(WidgetTable::class)
        ->assertStatus(200);
});

<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\View\Layouts\AppLayout;

class DevComponent extends Component
{
    use Renderable;

    public string $title = 'Dev Component';
    public string $layout = 'admin';

    // public function render()
    // {
    //     $data = [];

    //     return view('livewire.dev-component', $data)
    //         ->layout(AppLayout::class, [
    //             'title' => $this->title ?? 'null',
    //             'layout' => $this->layout ?? config('gotime.livewire_layout'),
    //         ]);
    // }
}

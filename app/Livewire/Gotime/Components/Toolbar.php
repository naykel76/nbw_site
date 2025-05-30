<?php

namespace App\Livewire\Gotime\Components;

use Livewire\Component;

class Toolbar extends Component
{
    public string $type = 'title';
    public string $pageTitle = 'User Title Toolbar Example';
    public string $routePrefix = 'users'; // ??

    public function render()
    {
        if ($this->type === 'title')
            return <<<'HTML'
                <div>
                    <x-gt-title-bar :$pageTitle :$routePrefix />
                </div>
            HTML;
    }
}

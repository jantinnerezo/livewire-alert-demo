<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;

class Options extends Component
{
    public array $options = [];

    public function updated($name, $value): void
    {
        $this->dispatch('updateOptions', options: $value);
    }

    public function render()
    {
        return view('livewire.options');
    }
}

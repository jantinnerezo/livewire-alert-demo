<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;

class Options extends Component
{
    public array $options = [];

    public function updated(string $name, mixed $value): void
    {
        $this->dispatch('updateOptions', options: [
            str($name)->after('.')->toString() => $value
        ]);
    }

    public function render()
    {
        return view('livewire.options');
    }
}

<?php

declare(strict_types=1);

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\Enums\Position;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Positions extends Component
{
    public string $position;

    public function mount(): void
    {
        $this->dispatch('updateOptions', options: [
            'position' => $this->position
        ]);
    }

    #[Computed]
    public function positions(): array
    {
        return collect(Position::cases())
            ->map(fn (Position $position) => [
                'label' => str($position->value)->title()->replace('-', ' '),
                'value' => $position->value
            ])
            ->toArray();
    }

    public function updated($name, $value): void
    {
        $this->dispatch('updateOptions', options: ['position' => $value]);
    }
    
    public function render()
    {
        return view('livewire.positions');
    }
}

<?php

declare(strict_types=1);

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\Enums\Icon;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ListIcons extends Component
{
    public string $icon;

    #[Computed]
    public function icons(): array
    {
        return collect(Icon::cases())
            ->map(fn (Icon $icon) => [
                'label' => str($icon->value)->title()->replace('_', ' '),
                'value' => $icon->value,
                'color' => match ($icon) {
                    Icon::Success => 'radio-success',
                    Icon::Warning => 'radio-warning',
                    Icon::Error => 'radio-error',
                    Icon::Info => 'radio-info',
                    Icon::Question => 'radio-question'
                }
            ])
            ->toArray();
    }

    public function updatedIcon(mixed $value): void
    {
        $this->dispatch('updateOptions', options: ['icon' => $value]);
    }

    public function render()
    {
        return view('livewire.list-icons');
    }
}

<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public function fireBasic(): void
    {
        LivewireAlert::title('Changes saved!')
            ->success()
            ->show();
    }

    public function fireWithText(): void
    {
        LivewireAlert::title('Item Saved')
            ->text('The item has been successfully saved to the database.')
            ->success()
            ->show();
    }

    public function fireIcon(string $icon): void
    {
        $alert = LivewireAlert::title(ucfirst($icon));

        match ($icon) {
            'success' => $alert->success(),
            'error' => $alert->error(),
            'warning' => $alert->warning(),
            'info' => $alert->info(),
            'question' => $alert->question(),
        };

        $alert->show();
    }

    public function firePosition(string $position): void
    {
        LivewireAlert::title("Position: {$position}")
            ->info()
            ->position(Position::from($position))
            ->timer(2000)
            ->show();
    }
};

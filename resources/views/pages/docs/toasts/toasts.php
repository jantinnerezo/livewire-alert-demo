<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public function fireToast(): void
    {
        LivewireAlert::title('Saved!')
            ->success()
            ->asToast()
            ->show();
    }

    public function fireManualToast(): void
    {
        LivewireAlert::title('Welcome!')
            ->text('You have logged in successfully.')
            ->info()
            ->toast()
            ->position('top-end')
            ->timer(3000)
            ->timerProgressBar()
            ->show();
    }

    public function fireBottomToast(): void
    {
        LivewireAlert::title('Queued')
            ->text('The notification was moved to the bottom.')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->timer(2500)
            ->timerProgressBar()
            ->show();
    }
};

<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public function openLoader(): void
    {
        LivewireAlert::title('Saving...')
            ->asLoading()
            ->show();
    }

    public function openCustomLoader(): void
    {
        LivewireAlert::asLoading('Uploading file...')->show();
    }

    public function closeLoader(): void
    {
        LivewireAlert::close();
    }

    public function simulateTask(): void
    {
        LivewireAlert::title('Processing...')
            ->asLoading()
            ->show();

        sleep(2);

        LivewireAlert::close();

        LivewireAlert::title('Done!')
            ->success()
            ->asToast()
            ->show();
    }
};

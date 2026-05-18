<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public function fireHello(): void
    {
        LivewireAlert::title('Hello from Livewire Alert!')
            ->success()
            ->asToast()
            ->show();
    }
};

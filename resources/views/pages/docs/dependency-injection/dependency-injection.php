<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public function save(LivewireAlert $alert): void
    {
        $alert->title('Success!')
            ->text('The alert was triggered through dependency injection.')
            ->success()
            ->asToast()
            ->show();
    }
};

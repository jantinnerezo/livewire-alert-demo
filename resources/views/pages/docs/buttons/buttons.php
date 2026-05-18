<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public function fireConfirmButton(): void
    {
        LivewireAlert::title('Save?')
            ->withConfirmButton('Yes, Save')
            ->show();
    }

    public function fireAllButtons(): void
    {
        LivewireAlert::title('Save changes?')
            ->question()
            ->withConfirmButton()
            ->confirmButtonText('Save')
            ->withDenyButton()
            ->denyButtonText('Discard')
            ->withCancelButton()
            ->cancelButtonText('Cancel')
            ->show();
    }

    public function fireColoredButtons(): void
    {
        LivewireAlert::title('Choose an action')
            ->question()
            ->withConfirmButton('Save')
            ->withDenyButton('Delete')
            ->withCancelButton('Cancel')
            ->confirmButtonColor('#16a34a')
            ->denyButtonColor('#dc2626')
            ->cancelButtonColor('#64748b')
            ->show();
    }
};

<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public function fireImage(): void
    {
        LivewireAlert::title('Livewire Alert')
            ->text('Images can help make important alerts easier to recognize.')
            ->imageUrl('/static/branding/banner.jpg')
            ->imageWidth(320)
            ->imageAlt('Livewire Alert banner')
            ->withConfirmButton('Nice')
            ->show();
    }

    public function fireCustomClass(): void
    {
        LivewireAlert::title('Styled Alert')
            ->success()
            ->customClass([
                'popup' => 'rounded-2xl',
                'confirmButton' => 'btn-primary',
                'cancelButton' => 'btn-secondary',
            ])
            ->withConfirmButton('Done')
            ->show();
    }

    public function fireReverseButtons(): void
    {
        LivewireAlert::title('Are you sure?')
            ->asConfirm()
            ->reverseButtons()
            ->show();
    }

    public function fireOptions(): void
    {
        LivewireAlert::title('Custom Alert')
            ->text('This alert has a custom width and background.')
            ->success()
            ->withOptions([
                'width' => '400px',
                'background' => '#18181b',
                'color' => '#f4f4f5',
                'allowOutsideClick' => false,
            ])
            ->withConfirmButton('Close')
            ->show();
    }
};

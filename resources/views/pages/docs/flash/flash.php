<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public function mount(): void
    {
        if (! session()->has('saved')) {
            return;
        }

        LivewireAlert::title(session('saved.title'))
            ->text(session('saved.text'))
            ->success()
            ->show();
    }

    public function previewFlash(): void
    {
        session()->flash('saved', [
            'title' => 'Changes Saved!',
            'text' => 'You can safely close the tab.',
        ]);

        LivewireAlert::title(session('saved.title'))
            ->text(session('saved.text'))
            ->success()
            ->show();
    }
};

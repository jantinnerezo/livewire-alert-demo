<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public string $timerMilliseconds = '3000';

    public function setTimerPreset(int $milliseconds): void
    {
        $this->timerMilliseconds = (string) $milliseconds;
    }

    public function fireTimer(): void
    {
        $duration = $this->timerDuration();

        LivewireAlert::title('Success')
            ->text("This alert closes after {$this->formatSeconds($duration)} seconds.")
            ->success()
            ->timer($duration)
            ->show();
    }

    public function fireProgressTimer(): void
    {
        $duration = $this->timerDuration();

        LivewireAlert::title('Success')
            ->text("Progress bar duration: {$this->formatSeconds($duration)} seconds.")
            ->success()
            ->timer($duration)
            ->timerProgressBar()
            ->show();
    }

    public function fireNoTimer(): void
    {
        LivewireAlert::title('Review required')
            ->text('This alert stays open until the user dismisses it.')
            ->warning()
            ->timer(null)
            ->withConfirmButton('Got it')
            ->show();
    }

    private function timerDuration(): int
    {
        $milliseconds = filter_var($this->timerMilliseconds, FILTER_VALIDATE_INT);

        if ($milliseconds === false) {
            $milliseconds = 3000;
        }

        $milliseconds = min(max($milliseconds, 500), 15000);

        $this->timerMilliseconds = (string) $milliseconds;

        return $milliseconds;
    }

    private function formatSeconds(int $milliseconds): string
    {
        return rtrim(rtrim(number_format($milliseconds / 1000, 2), '0'), '.');
    }
};

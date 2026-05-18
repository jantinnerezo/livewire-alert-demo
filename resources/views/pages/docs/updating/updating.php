<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public int $step = 0;

    public bool $running = false;

    /** @var list<string> */
    protected array $phases = [
        'Connecting...',
        'Authenticating...',
        'Fetching data...',
        'Validating records...',
        'Crunching numbers...',
        'Building report...',
        'Compressing output...',
        'Uploading results...',
        'Sending notifications...',
        'Almost there...',
        'Wrapping up...',
        'Finalizing...',
    ];

    public function fluentUpdate(): void
    {
        LivewireAlert::title('Updated title')
            ->text('Body changed in place — no flicker.')
            ->update();
    }

    public function arrayUpdate(): void
    {
        LivewireAlert::update([
            'title' => 'Direct payload',
            'icon' => 'success',
        ]);
    }

    public function start(): void
    {
        $this->step = 0;
        $this->running = true;

        LivewireAlert::title($this->phases[0])
            ->asLoading()
            ->show();
    }

    public function tick(): void
    {
        if (!$this->running) {
            return;
        }

        $this->step++;

        if ($this->step >= count($this->phases)) {
            $this->running = false;

            LivewireAlert::close();
            LivewireAlert::title('Done!')->success()->asToast()->show();

            return;
        }

        LivewireAlert::title($this->phases[$this->step])->update();
    }
};

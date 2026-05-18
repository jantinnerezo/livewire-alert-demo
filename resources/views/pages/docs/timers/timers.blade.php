@section('title', 'Timers')

<div>
    <div class="mb-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">Core Pattern</p>
        <h1 class="mb-4 text-4xl font-bold tracking-tight text-white">Timers</h1>
        <p class="max-w-2xl text-lg leading-8 text-zinc-400">
            Timers automatically dismiss alerts after a fixed duration. They are useful for success states and passive messages.
        </p>
    </div>

    <x-docs.section title="Timer" description="Pass milliseconds to <code>timer()</code>. Try a custom duration below; the demo accepts 500ms to 15000ms.">
        <x-slot:demo>
            <div class="grid w-full gap-4">
                <div class="flex flex-wrap items-end gap-3">
                    <label class="grid gap-1.5">
                        <span class="text-xs font-semibold uppercase tracking-[0.14em] text-zinc-500">Milliseconds</span>
                        <input
                            type="number"
                            min="500"
                            max="15000"
                            step="250"
                            wire:model.blur="timerMilliseconds"
                            class="h-10 w-36 rounded-lg border border-white/10 bg-zinc-950 px-3 text-sm font-medium text-white outline-none transition placeholder:text-zinc-600 focus:border-amber-300/50 focus:ring-2 focus:ring-amber-300/10"
                        />
                    </label>

                    <div class="flex flex-wrap gap-2">
                        <flux:button wire:click="setTimerPreset(1000)" size="sm">1s</flux:button>
                        <flux:button wire:click="setTimerPreset(3000)" size="sm">3s</flux:button>
                        <flux:button wire:click="setTimerPreset(5000)" size="sm">5s</flux:button>
                    </div>

                    <flux:button wire:click="fireTimer" variant="primary" size="sm">Run timer</flux:button>
                </div>

                <p class="text-xs leading-5 text-zinc-500">
                    Current duration: <span class="font-mono text-amber-200">{{ $timerMilliseconds }}ms</span>
                    <span class="text-zinc-700">/</span>
                    <span class="font-mono text-zinc-300">{{ rtrim(rtrim(number_format(((int) $timerMilliseconds) / 1000, 2), '0'), '.') }}s</span>
                </p>
            </div>
        </x-slot:demo>

        <x-slot:code>
public string $timerMilliseconds = '3000';

public function fireTimer(): void
{
    $duration = (int) $this->timerMilliseconds;

    LivewireAlert::title('Success')
        ->text("This alert closes after {$duration}ms.")
        ->success()
        ->timer($duration)
        ->show();
}
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Static timer" description="For fixed durations, pass the number directly. SweetAlert2 expects milliseconds, so <code>3000</code> means 3 seconds.">
        <x-slot:code>
LivewireAlert::title('Success')
    ->text('Operation completed successfully.')
    ->success()
    ->timer(3000)
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Timer progress bar" description="Use <code>timerProgressBar()</code> to show the countdown visually. This demo uses the same custom duration from above.">
        <x-slot:demo>
            <flux:button wire:click="fireProgressTimer" size="sm">With progress</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Success')
    ->text("Progress bar duration: {$duration}ms.")
    ->success()
    ->timer($duration)
    ->timerProgressBar()
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Disable the timer" description="Use <code>timer(null)</code> for alerts that require explicit user action.">
        <x-slot:demo>
            <flux:button wire:click="fireNoTimer" size="sm">No timer</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Review required')
    ->warning()
    ->timer(null)
    ->withConfirmButton('Got it')
    ->show();
        </x-slot:code>
    </x-docs.section>
</div>

@section('title', 'Updating')

<div>
    <div class="mb-12">
        <h1 class="mb-5 text-[42px] font-extrabold leading-tight text-white">Updating an Open Alert</h1>
        <p class="max-w-[760px] text-xl leading-9 text-slate-400">
            Mutate the currently-open alert in place — no close/reopen, no flicker. Wraps SweetAlert2's <code class="rounded bg-[#202a3d] px-1.5 py-0.5 text-sm text-slate-200">Swal.update()</code>.
        </p>
    </div>

    <x-docs.section
        title="Fluent form"
        description="Chain setters, then call update() instead of show(). Open an alert first via the Loading page or any other call — then click Update."
    >
        <x-slot:demo>
            <flux:button wire:click="start" variant="primary" size="sm">Open spinner first</flux:button>
            <flux:button wire:click="fluentUpdate" size="sm">Update title + text</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Updated title')
    ->text('Body changed in place — no flicker.')
    ->update();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Explicit payload form" description="Pass a SweetAlert2 options array directly.">
        <x-slot:demo>
            <flux:button wire:click="arrayUpdate" size="sm">Update via array</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::update([
    'title' => 'Direct payload',
    'icon' => 'success',
]);
        </x-slot:code>
    </x-docs.section>

    <x-docs.section
        title="Live progress"
        description="Combine asLoading() + wire:poll + update() for long-running work. Spinner stays, title rotates through phases."
    >
        <x-slot:demo>
            <flux:button wire:click="start" variant="primary" size="sm">Start phased task</flux:button>
        </x-slot:demo>

        @if ($running)
            <div wire:poll.800ms="tick" class="mt-3 text-xs text-slate-500">Polling… phase {{ $step + 1 }} / {{ 12 }}</div>
        @endif

        <x-slot:code>
public int $step = 0;
public bool $running = false;

protected array $phases = [
    'Connecting...',
    'Fetching data...',
    'Crunching numbers...',
    'Almost there...',
    'Wrapping up...',
];

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
    if (!$this->running) return;

    $this->step++;

    if ($this->step >= count($this->phases)) {
        $this->running = false;
        LivewireAlert::close();
        LivewireAlert::title('Done!')->success()->asToast()->show();
        return;
    }

    LivewireAlert::title($this->phases[$this->step])->update();
}
        </x-slot:code>

        @php
$bladeCode = <<<'BLADE'
<div>
    <button wire:click="start">Start</button>

    @if ($running)
        <div wire:poll.800ms="tick"></div>
    @endif
</div>
BLADE;
        @endphp

        <div class="mt-4 overflow-hidden rounded-lg border border-white/[0.04] bg-[#202a3d] text-sm shadow-[0_16px_40px_rgba(0,0,0,0.12)]">
            <div class="border-b border-white/[0.04] bg-[#1b2435] px-5 py-2 text-xs font-bold uppercase tracking-wide text-slate-500">Blade</div>
            <div class="overflow-x-auto p-5 text-[15px] leading-7 text-slate-300 [&_code]:!rounded-none [&_code]:!bg-transparent [&_code]:!p-0 [&_code]:!text-[inherit] [&_pre]:!m-0 [&_pre]:!bg-transparent [&_pre]:!p-0">
                {!! app(\App\Actions\HighlightCodeAction::class)->execute($bladeCode, 'blade') !!}
            </div>
        </div>
    </x-docs.section>

    <x-docs.section
        title="Real Laravel job batch"
        description="Drive update() from <code class='rounded bg-[#202a3d] px-1.5 py-0.5 text-xs text-slate-200'>Bus::batch()</code> state. Shown for reference — no live demo here since it requires a queue worker."
    >
        <x-slot:code>
use Illuminate\Support\Facades\Bus;

public ?string $batchId = null;

public function start(): void
{
    $batch = Bus::batch([
        new \App\Jobs\ProcessRow(/* ... */),
        new \App\Jobs\ProcessRow(/* ... */),
    ])
        ->name('row-import')
        ->allowFailures()
        ->dispatch();

    $this->batchId = $batch->id;

    LivewireAlert::title('Queued — waiting for workers...')
        ->asLoading()
        ->show();
}

public function tick(): void
{
    if (!$this->batchId) return;

    $batch = Bus::findBatch($this->batchId);

    if (!$batch) {
        $this->batchId = null;
        LivewireAlert::close();
        return;
    }

    if ($batch->finished()) {
        $this->batchId = null;
        LivewireAlert::close();

        $batch->hasFailures()
            ? LivewireAlert::title("Finished with {$batch->failedJobs} failure(s)")->warning()->asToast()->show()
            : LivewireAlert::title('Batch complete!')->success()->asToast()->show();

        return;
    }

    LivewireAlert::title("Processed {$batch->processedJobs()} of {$batch->totalJobs}")
        ->update();
}
        </x-slot:code>

        <p class="mt-4 text-[15px] leading-7 text-slate-400">
            Use <code class="rounded bg-[#202a3d] px-1.5 py-0.5 text-xs text-slate-200">$batch->progress()</code> (0–100) if you want a percent.
            For push-driven updates, listen to batch events via Laravel Echo and call <code class="rounded bg-[#202a3d] px-1.5 py-0.5 text-xs text-slate-200">update()</code> from a Livewire <code class="rounded bg-[#202a3d] px-1.5 py-0.5 text-xs text-slate-200">#[On(...)]</code> listener — same API, no polling.
        </p>
    </x-docs.section>

    <div class="mt-2 rounded-lg border border-white/[0.06] bg-[#202a3d]/70 p-5 text-sm leading-7 text-slate-400">
        <strong class="text-slate-200">Note:</strong> <code class="rounded bg-[#151d2b] px-1.5 py-0.5 text-xs text-slate-200">Swal.update()</code> does not preserve input field values, fire <code class="rounded bg-[#151d2b] px-1.5 py-0.5 text-xs text-slate-200">didOpen</code>, or rebind event handlers. It only swaps visual options. If no alert is currently visible, <code class="rounded bg-[#151d2b] px-1.5 py-0.5 text-xs text-slate-200">update()</code> is a no-op (warning logged to console).
    </div>
</div>

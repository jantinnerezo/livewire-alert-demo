@section('title', 'Toast Notifications')

<div>
    <div class="mb-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">Core Pattern</p>
        <h1 class="mb-4 text-4xl font-bold tracking-tight text-white">Toast Notifications</h1>
        <p class="max-w-2xl text-lg leading-8 text-zinc-400">
            Use toast alerts for non-blocking feedback after saves, redirects, background actions, or small status changes.
        </p>
    </div>

    <x-docs.section title="asToast()" description="Use <code>asToast()</code> for the package preset: top-end position, configured timer, and progress bar enabled.">
        <x-slot:demo>
            <flux:button wire:click="fireToast" variant="primary" size="sm">Fire toast</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Saved!')
    ->success()
    ->asToast()
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Manual toast" description="Call <code>toast()</code> when you want to choose each SweetAlert2 option yourself.">
        <x-slot:demo>
            <flux:button wire:click="fireManualToast" size="sm">Manual toast</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Welcome!')
    ->text('You have logged in successfully.')
    ->info()
    ->toast()
    ->position('top-end')
    ->timer(3000)
    ->timerProgressBar()
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Choosing a position" description="Toasts use the same <code>position()</code> values as modal alerts, including top, center, and bottom variants.">
        <x-slot:demo>
            <flux:button wire:click="fireBottomToast" size="sm">Bottom toast</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Queued')
    ->success()
    ->toast()
    ->position('bottom-end')
    ->timer(2500)
    ->timerProgressBar()
    ->show();
        </x-slot:code>
    </x-docs.section>

    <div class="mt-10 rounded-xl border border-white/10 bg-zinc-900/60 p-5 text-sm text-zinc-400">
        Next: <a href="/timers" wire:navigate>Timers</a>
    </div>
</div>

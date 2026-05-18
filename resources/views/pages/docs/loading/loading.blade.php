@section('title', 'Loading')

<div>
    <div class="mb-12">
        <h1 class="mb-5 text-[42px] font-extrabold leading-tight text-white">Loading Alert</h1>
        <p class="max-w-[760px] text-xl leading-9 text-slate-400">
            Show a non-dismissable spinner while a long-running action is in flight. Pair with <code class="rounded bg-[#202a3d] px-1.5 py-0.5 text-sm text-slate-200">close()</code> to dismiss it once done.
        </p>
    </div>

    <x-docs.section
        title="asLoading()"
        description="Locks the alert (no buttons, ESC + backdrop click ignored) and triggers <code class='rounded bg-[#202a3d] px-1.5 py-0.5 text-xs text-slate-200'>Swal.showLoading()</code> on open via the didOpen callback."
    >
        <x-slot:demo>
            <flux:button wire:click="openLoader" variant="primary" size="sm">Open default loader</flux:button>
            <flux:button wire:click="closeLoader" variant="danger" size="sm">Close</flux:button>
        </x-slot:demo>

        <x-slot:code>
public function save(): void
{
    LivewireAlert::title('Saving...')
        ->asLoading()
        ->show();

    // long-running work here
    $this->persist();

    LivewireAlert::close();
}
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Custom title" description="Pass a string to override the default 'Loading...' title.">
        <x-slot:demo>
            <flux:button wire:click="openCustomLoader" size="sm">Open custom-title loader</flux:button>
            <flux:button wire:click="closeLoader" variant="danger" size="sm">Close</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::asLoading('Uploading file...')->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section
        title="Full lifecycle"
        description="Open, do work, close, then toast on completion. Handler runs server-side so the spinner stays up until the request returns."
    >
        <x-slot:demo>
            <flux:button wire:click="simulateTask" variant="primary" size="sm">Simulate 2s task</flux:button>
        </x-slot:demo>

        <x-slot:code>
public function process(): void
{
    LivewireAlert::title('Processing...')
        ->asLoading()
        ->show();

    sleep(2); // your long-running work

    LivewireAlert::close();

    LivewireAlert::title('Done!')
        ->success()
        ->asToast()
        ->show();
}
        </x-slot:code>
    </x-docs.section>

    <div class="mt-2 rounded-lg border border-white/[0.06] bg-[#202a3d]/70 p-5 text-sm text-slate-400">
        Next: <a href="/updating" wire:navigate class="text-white underline decoration-slate-600 underline-offset-4 hover:text-pink-300">Updating an open alert</a> →
    </div>
</div>

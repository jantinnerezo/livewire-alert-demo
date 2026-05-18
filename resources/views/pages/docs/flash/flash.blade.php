@section('title', 'Flash Alerts')

<div>
    <div class="mb-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">Advanced</p>
        <h1 class="mb-4 text-4xl font-bold tracking-tight text-white">Flash Alerts</h1>
        <p class="max-w-2xl text-lg leading-8 text-zinc-400">
            Use Laravel session flashing when an alert should appear after a redirect or after a fresh component mount.
        </p>
    </div>

    <x-docs.section title="Flash alert" description="Flash whatever structure your app needs, then read it from <code>mount()</code>.">
        <x-slot:demo>
            <flux:button wire:click="previewFlash" variant="primary" size="sm">Preview flash</flux:button>
        </x-slot:demo>

        <x-slot:code>
public function mount()
{
    if (session()->has('saved')) {
        LivewireAlert::title(session('saved.title'))
            ->text(session('saved.text'))
            ->success()
            ->show();
    }
}
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Redirect flow" description="Set the flash data before redirecting. The destination component can read and show it.">
        <x-slot:code>
public function changesSaved()
{
    session()->flash('saved', [
        'title' => 'Changes Saved!',
        'text' => 'You can safely close the tab!',
    ]);

    $this->redirect('/dashboard');
}
        </x-slot:code>
    </x-docs.section>
</div>

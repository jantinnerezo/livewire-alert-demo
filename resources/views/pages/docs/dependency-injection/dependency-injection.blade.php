@section('title', 'Dependency Injection')

<div>
    <div class="mb-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">Advanced</p>
        <h1 class="mb-4 text-4xl font-bold tracking-tight text-white">Dependency Injection</h1>
        <p class="max-w-2xl text-lg leading-8 text-zinc-400">
            You can inject the alert builder directly into Livewire actions instead of using the facade.
        </p>
    </div>

    <x-docs.section title="Inject the alert" description="Type-hint <code>Jantinnerezo\LivewireAlert\LivewireAlert</code> on your component method and chain the same API.">
        <x-slot:demo>
            <flux:button wire:click="save" variant="primary" size="sm">Injected alert</flux:button>
        </x-slot:demo>

        <x-slot:code>
use Jantinnerezo\LivewireAlert\LivewireAlert;

public function save(LivewireAlert $alert)
{
    $alert->title('Success!')
        ->text('What would you like to do?')
        ->question()
        ->withConfirmButton('Save')
        ->withCancelButton('Cancel')
        ->withDenyButton('Delete')
        ->onConfirm('saveFile', ['id' => $this->fileId])
        ->onDeny('deleteFile', ['id' => $this->fileId])
        ->onDismiss('cancelAction', ['id' => $this->fileId])
        ->show();
}
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="When to use it" description="Dependency injection is useful when you prefer explicit dependencies in actions or want to avoid facade calls in component methods.">
        <ul class="space-y-2 text-sm leading-6 text-zinc-400">
            <li>The injected class supports the same fluent methods as the facade.</li>
            <li>The alert still runs in the current Livewire component context.</li>
            <li>Use whichever style is clearer for the component you are writing.</li>
        </ul>
    </x-docs.section>
</div>

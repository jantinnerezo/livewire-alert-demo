@section('title', 'Button Events')

<div>
    <div class="mb-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">Core Pattern</p>
        <h1 class="mb-4 text-4xl font-bold tracking-tight text-white">Button Events</h1>
        <p class="max-w-2xl text-lg leading-8 text-zinc-400">
            Wire SweetAlert2 button results back to Livewire methods with <code>onConfirm()</code>, <code>onDeny()</code>, and <code>onDismiss()</code>.
        </p>

        @if ($lastAction)
            <div class="mt-6 rounded-xl border border-emerald-300/20 bg-emerald-400/10 px-4 py-3 text-sm font-medium text-emerald-200">
                Last event: {{ $lastAction }}
            </div>
        @endif
    </div>

    <x-docs.section title="onConfirm()" description="Use <code>onConfirm()</code> to call a Livewire method after the confirm button is clicked.">
        <x-slot:demo>
            <flux:button wire:click="askConfirm" variant="primary" size="sm">Confirm event</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Save?')
    ->withConfirmButton('Save')
    ->onConfirm('saveData', ['id' => $this->itemId])
    ->show();

public function saveData(array $data)
{
    $itemId = $data['id'];
}
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="onDismiss()" description="Dismiss events cover cancel buttons, backdrop dismissals, escape key dismissals, and close actions.">
        <x-slot:demo>
            <flux:button wire:click="askDismiss" size="sm">Dismiss event</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Delete?')
    ->withConfirmButton('Delete')
    ->withCancelButton('Keep')
    ->onDismiss('cancelDelete', ['id' => $this->itemId])
    ->show();

public function cancelDelete(array $data)
{
    $itemId = $data['id'];
}
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="onDeny()" description="Use deny when the user is choosing a meaningful alternative, not just cancelling.">
        <x-slot:demo>
            <flux:button wire:click="askDeny" size="sm">Deny event</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Update?')
    ->withConfirmButton('Update')
    ->withDenyButton('Discard')
    ->onDeny('discardChanges', ['id' => $this->itemId])
    ->show();

public function discardChanges(array $data)
{
    $itemId = $data['id'];
}
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Using them together" description="An alert can map every possible decision to a different Livewire method.">
        <x-slot:demo>
            <flux:button wire:click="askTogether" variant="primary" size="sm">Three-way decision</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Process File')
    ->text('What would you like to do?')
    ->question()
    ->withConfirmButton('Save')
    ->withCancelButton('Cancel')
    ->withDenyButton('Delete')
    ->onConfirm('saveFile', ['id' => $this->fileId])
    ->onDeny('deleteFile', ['id' => $this->fileId])
    ->onDismiss('cancelAction', ['id' => $this->fileId])
    ->show();
        </x-slot:code>
    </x-docs.section>
</div>

@section('title', 'Confirm Dialog')

<div>
    <div class="mb-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">Core Pattern</p>
        <h1 class="mb-4 text-4xl font-bold tracking-tight text-white">Confirm Dialog</h1>
        <p class="max-w-2xl text-lg leading-8 text-zinc-400">
            Use <code>asConfirm()</code> for decisions that should not auto-dismiss and require a clear user choice.
        </p>

        @if ($result)
            <div class="mt-6 rounded-xl border border-emerald-300/20 bg-emerald-400/10 px-4 py-3 text-sm font-medium text-emerald-200">
                {{ $result }}
            </div>
        @endif
    </div>

    <x-docs.section title="asConfirm()" description="The preset applies a question icon, confirm and deny buttons, and disables the timer.">
        <x-slot:demo>
            <flux:button wire:click="askConfirm" variant="primary" size="sm">Open confirm</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Are you sure?')
    ->text('Do you want to proceed with this action?')
    ->asConfirm()
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Handling events" description="Combine <code>asConfirm()</code> with button event handlers to run different server-side logic.">
        <x-slot:demo>
            <flux:button wire:click="askDelete" size="sm">Delete flow</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Delete Item')
    ->text('Are you sure you want to delete this item?')
    ->asConfirm()
    ->onConfirm('deleteItem', ['id' => $this->itemId])
    ->onDeny('keepItem', ['id' => $this->itemId])
    ->show();

public function deleteItem(array $data)
{
    $itemId = $data['id'];
}

public function keepItem(array $data)
{
    $itemId = $data['id'];
}
        </x-slot:code>
    </x-docs.section>
</div>

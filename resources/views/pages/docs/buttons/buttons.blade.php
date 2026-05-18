@section('title', 'Buttons')

<div>
    <div class="mb-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">Core Pattern</p>
        <h1 class="mb-4 text-4xl font-bold tracking-tight text-white">Buttons</h1>
        <p class="max-w-2xl text-lg leading-8 text-zinc-400">
            Add confirm, cancel, and deny buttons when an alert needs an explicit decision.
        </p>
    </div>

    <x-docs.section title="Button types" description="Enable the buttons you need with <code>withConfirmButton()</code>, <code>withCancelButton()</code>, and <code>withDenyButton()</code>.">
        <x-slot:demo>
            <flux:button wire:click="fireConfirmButton" variant="primary" size="sm">Confirm button</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Save?')
    ->withConfirmButton('Yes, Save')
    ->show();

LivewireAlert::title('Hey cancel')
    ->withCancelButton('Cancel')
    ->show();

LivewireAlert::title('Do you want to do it?')
    ->withDenyButton('No')
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Button text" description="Enable each button first, then override the text with the matching text method.">
        <x-slot:demo>
            <flux:button wire:click="fireAllButtons" size="sm">All buttons</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Save?')
    ->withConfirmButton()
    ->confirmButtonText('Save')
    ->withDenyButton()
    ->denyButtonText('Discard')
    ->withCancelButton()
    ->cancelButtonText('Cancel')
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Button colors" description="Use CSS color names, hex values, or other CSS-compatible colors.">
        <x-slot:demo>
            <flux:button wire:click="fireColoredButtons" size="sm">Colored buttons</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Choose an action')
    ->question()
    ->withConfirmButton('Save')
    ->withDenyButton('Delete')
    ->withCancelButton('Cancel')
    ->confirmButtonColor('#16a34a')
    ->denyButtonColor('#dc2626')
    ->cancelButtonColor('#64748b')
    ->show();
        </x-slot:code>
    </x-docs.section>
</div>

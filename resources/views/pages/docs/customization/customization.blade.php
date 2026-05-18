@section('title', 'Customization')

<div>
    <div class="mb-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">Advanced</p>
        <h1 class="mb-4 text-4xl font-bold tracking-tight text-white">Customization</h1>
        <p class="max-w-2xl text-lg leading-8 text-zinc-400">
            Use image helpers, CSS classes, button ordering, and raw SweetAlert2 options when built-in presets are not enough.
        </p>
    </div>

    <x-docs.section title="Image" description="Use <code>imageUrl()</code>, <code>imageWidth()</code>, <code>imageHeight()</code>, and <code>imageAlt()</code> for custom alert imagery.">
        <x-slot:demo>
            <flux:button wire:click="fireImage" variant="primary" size="sm">Image alert</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Livewire Alert')
    ->imageUrl('/images/example.png')
    ->imageWidth(320)
    ->imageAlt('Livewire Alert banner')
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Custom CSS classes" description="Use <code>customClass()</code> to apply SweetAlert2 custom class names to alert parts.">
        <x-slot:demo>
            <flux:button wire:click="fireCustomClass" size="sm">Styled alert</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Styled Alert')
    ->success()
    ->customClass([
        'popup' => 'rounded-2xl',
        'confirmButton' => 'btn-primary',
        'cancelButton' => 'btn-secondary',
    ])
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Reverse buttons" description="Use <code>reverseButtons()</code> when your destructive flow needs the confirm and cancel positions swapped.">
        <x-slot:demo>
            <flux:button wire:click="fireReverseButtons" size="sm">Reverse buttons</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Are you sure?')
    ->asConfirm()
    ->reverseButtons()
    ->onConfirm('deleteItem')
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Options" description="Use <code>withOptions()</code> for any SweetAlert2-compatible option that does not have a dedicated helper.">
        <x-slot:demo>
            <flux:button wire:click="fireOptions" size="sm">Custom options</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Custom Alert')
    ->text('This alert has a unique style.')
    ->success()
    ->withOptions([
        'width' => '400px',
        'background' => '#18181b',
        'color' => '#f4f4f5',
        'allowOutsideClick' => false,
    ])
    ->show();
        </x-slot:code>

        <p class="mt-4 text-sm leading-6 text-zinc-400">
            See the SweetAlert2 configuration reference for the full option list.
        </p>
    </x-docs.section>
</div>

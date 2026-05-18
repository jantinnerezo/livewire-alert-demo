@section('title', 'Inputs')

<div>
    <div class="mb-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">Core Pattern</p>
        <h1 class="mb-4 text-4xl font-bold tracking-tight text-white">Inputs</h1>
        <p class="max-w-2xl text-lg leading-8 text-zinc-400">
            Collect small pieces of input directly inside an alert and receive the value in a Livewire event handler.
        </p>

        @if ($lastValue)
            <div class="mt-6 rounded-xl border border-emerald-300/20 bg-emerald-400/10 px-4 py-3 text-sm font-medium text-emerald-200">
                Last input: {{ $lastValue }}
            </div>
        @endif
    </div>

    <x-docs.section title="Text input" description="Text inputs return the entered string as <code>$data['value']</code>.">
        <x-slot:demo>
            <flux:button wire:click="askName" variant="primary" size="sm">Text input</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Enter your name')
    ->withTextInput(label: 'Full name', placeholder: 'John Doe')
    ->withConfirmButton('Submit')
    ->onConfirm('saveName')
    ->show();

public function saveName(array $data)
{
    $name = $data['value'];
}
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Email and number" description="Use the dedicated input helpers when browser-level input behavior matters.">
        <x-slot:demo>
            <flux:button wire:click="askEmail" size="sm">Email input</flux:button>
            <flux:button wire:click="askQuantity" size="sm">Number input</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Your email')
    ->withEmailInput(placeholder: 'you@example.com')
    ->withConfirmButton('Submit')
    ->onConfirm('saveEmail')
    ->show();

LivewireAlert::title('Quantity')
    ->withNumberInput(placeholder: '1')
    ->withConfirmButton('OK')
    ->onConfirm('saveQty')
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Select and radio" description="Select and radio inputs return the selected option key.">
        <x-slot:demo>
            <flux:button wire:click="askSize" size="sm">Select input</flux:button>
            <flux:button wire:click="askChoice" size="sm">Radio input</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Choose a size')
    ->withSelectInput(
        options: ['s' => 'Small', 'm' => 'Medium', 'l' => 'Large'],
        label: 'Size',
    )
    ->withConfirmButton('Confirm')
    ->onConfirm('processSelection')
    ->show();

public function processSelection(array $data)
{
    $size = $data['value'];
}
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Checkbox and file" description="Checkbox values return <code>1</code> when checked and <code>null</code> otherwise. File inputs are available for SweetAlert2 file prompts.">
        <x-slot:demo>
            <flux:button wire:click="askTerms" size="sm">Checkbox input</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Terms')
    ->withCheckboxInput(label: 'I agree to the terms')
    ->withConfirmButton('Continue')
    ->onConfirm('acceptTerms')
    ->show();

LivewireAlert::title('Upload')
    ->withFileInput(label: 'Choose a file')
    ->withConfirmButton('Upload')
    ->onConfirm('handleUpload')
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Handling values" description="Every input event payload includes the value under <code>$data['value']</code>.">
        <ul class="space-y-2 text-sm leading-6 text-zinc-400">
            <li>Text, email, password, number, and textarea inputs return the entered value.</li>
            <li>Select and radio inputs return the selected option key.</li>
            <li>Checkbox inputs return <code>1</code> when checked and <code>null</code> otherwise.</li>
        </ul>
    </x-docs.section>
</div>

@section('title', 'Basic Usage')

<div>
    <div class="mb-12">
        <h1 class="mb-5 text-[42px] font-extrabold leading-tight text-white">Basic Usage</h1>
        <p class="max-w-[760px] text-xl leading-9 text-slate-400">
            Build alerts fluently — chain setters, end with <code class="rounded bg-[#202a3d] px-1.5 py-0.5 text-sm text-slate-200">show()</code>.
        </p>
    </div>

    <x-docs.section title="Hello world" description="Title + icon + show.">
        <x-slot:demo>
            <flux:button wire:click="fireBasic" variant="primary" size="sm">Fire alert</flux:button>
        </x-slot:demo>

        <x-slot:code>
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

public function save()
{
    LivewireAlert::title('Changes saved!')
        ->success()
        ->show();
}
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Adding text" description="Use text() for body copy below the title.">
        <x-slot:demo>
            <flux:button wire:click="fireWithText" variant="primary" size="sm">Fire with text</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Item Saved')
    ->text('The item has been successfully saved to the database.')
    ->success()
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Icons" description="Five built-in icon types.">
        <x-slot:demo>
            <flux:button wire:click="fireIcon('success')" variant="primary" size="sm">success</flux:button>
            <flux:button wire:click="fireIcon('error')" variant="danger" size="sm">error</flux:button>
            <flux:button wire:click="fireIcon('warning')" variant="filled" size="sm">warning</flux:button>
            <flux:button wire:click="fireIcon('info')" variant="filled" size="sm">info</flux:button>
            <flux:button wire:click="fireIcon('question')" variant="filled" size="sm">question</flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Success')->success()->show();
LivewireAlert::title('Error')->error()->show();
LivewireAlert::title('Warning')->warning()->show();
LivewireAlert::title('Info')->info()->show();
LivewireAlert::title('Question')->question()->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Position" description="Place alerts anywhere on the screen. Pass a Position enum or matching string.">
        <x-slot:demo>
            <flux:button wire:click="firePosition('top-start')" size="sm">top-start</flux:button>
            <flux:button wire:click="firePosition('top-end')" size="sm">top-end</flux:button>
            <flux:button wire:click="firePosition('center')" size="sm">center</flux:button>
            <flux:button wire:click="firePosition('bottom-start')" size="sm">bottom-start</flux:button>
            <flux:button wire:click="firePosition('bottom-end')" size="sm">bottom-end</flux:button>
        </x-slot:demo>

        <x-slot:code>
use Jantinnerezo\LivewireAlert\Enums\Position;

LivewireAlert::title('Question')
    ->position(Position::Center)
    ->question()
    ->show();

// or as string
LivewireAlert::title('Question')
    ->position('center')
    ->question()
    ->show();
        </x-slot:code>
    </x-docs.section>

    <div class="mt-2 rounded-lg border border-white/[0.06] bg-[#202a3d]/70 p-5 text-sm text-slate-400">
        Next: <a href="/loading" wire:navigate class="text-white underline decoration-slate-600 underline-offset-4 hover:text-pink-300">Loading alerts</a> →
    </div>
</div>

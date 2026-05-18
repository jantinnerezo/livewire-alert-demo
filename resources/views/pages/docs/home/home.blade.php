@section('title', 'Overview')

@php
    $docHighlights = [
        [
            'title' => 'Getting started',
            'description' => 'Install the package, register SweetAlert2, and trigger your first alert.',
            'links' => [
                ['Installation', '/installation'],
                ['Basic Usage', '/basic-usage'],
            ],
        ],
        [
            'title' => 'Core patterns',
            'description' => 'Build the common alert flows: toasts, timers, buttons, decisions, and inputs.',
            'links' => [
                ['Toast Notifications', '/toasts'],
                ['Timers', '/timers'],
                ['Buttons', '/buttons'],
                ['Button Events', '/button-events'],
                ['Confirm Dialog', '/confirm'],
                ['Inputs', '/inputs'],
            ],
        ],
        [
            'title' => 'Advanced flows',
            'description' => 'Handle long-running work, update open alerts, flash across redirects, and customize SweetAlert2 options.',
            'links' => [
                ['Loading States', '/loading'],
                ['Updating Alerts', '/updating'],
                ['Flash Alerts', '/flash'],
                ['Customization', '/customization'],
                ['Dependency Injection', '/dependency-injection'],
            ],
        ],
    ];
@endphp

<div>
    <div class="mb-11">
        <h1 class="mb-5 text-[42px] font-extrabold leading-tight text-white">Livewire Alert Documentation</h1>

        <p class="mb-8 max-w-[760px] text-xl leading-9 text-slate-400">
            SweetAlert2 alerts, toasts, confirmations, inputs, loading states, and progress updates from a fluent Livewire PHP API.
        </p>
    </div>

    <x-docs.section title="Try it" description="This page is a Livewire component, so the button below fires a real SweetAlert2 toast.">
        <x-slot:demo>
            <flux:button wire:click="fireHello" variant="primary" size="sm">
                Fire toast
            </flux:button>
        </x-slot:demo>

        <x-slot:code>
LivewireAlert::title('Hello from Livewire Alert!')
    ->success()
    ->asToast()
    ->show();
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="What's inside?" description="The current docs cover the v4 package API and the Livewire workflows it is designed for.">
        <div class="grid gap-4 md:grid-cols-3">
            @foreach ($docHighlights as $group)
                <div class="rounded-lg border border-white/10 bg-zinc-900/55 p-5">
                    <h3 class="mb-2 text-base font-bold text-white">{{ $group['title'] }}</h3>
                    <p class="mb-4 text-sm leading-6 text-zinc-500">{{ $group['description'] }}</p>

                    <div class="grid gap-2">
                        @foreach ($group['links'] as [$label, $path])
                            <a href="{{ $path }}" wire:navigate class="group inline-flex items-center justify-between gap-3 rounded-md px-3 py-2 text-sm font-medium text-zinc-300 transition hover:bg-zinc-950/70 hover:text-white">
                                <span>{{ $label }}</span>
                                <span class="text-zinc-600 transition group-hover:text-rose-200">-&gt;</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5 rounded-lg border border-white/10 bg-zinc-950/45 p-5 text-[15px] leading-7 text-slate-400">
            <strong class="text-slate-200">Older package docs:</strong>
            use the version dropdown in the sidebar to open the tagged GitHub README for v3, v2, or v1.
        </div>
    </x-docs.section>
</div>

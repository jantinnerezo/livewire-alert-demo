@php
    $current = trim(request()->path(), '/');

    $pageDescription = match ($current) {
        '' => 'Explore the Livewire Alert documentation for SweetAlert2 alerts, toasts, confirmations, inputs, loading states, and progress updates in Laravel Livewire.',
        'installation' => 'Install Livewire Alert, publish its config, register SweetAlert2, and set up the package for Laravel Livewire or Filament.',
        'basic-usage' => 'Create Livewire Alert notifications with titles, text, icons, positions, and the fluent PHP API.',
        'toasts' => 'Build SweetAlert2 toast notifications from Livewire with asToast, manual toast options, timers, and positions.',
        'timers' => 'Configure Livewire Alert auto-dismiss timers, progress bars, and persistent alerts that require user action.',
        'buttons' => 'Add confirm, cancel, and deny buttons to Livewire Alert dialogs with custom labels and colors.',
        'button-events' => 'Handle Livewire Alert confirm, dismiss, and deny button events in your Livewire component methods.',
        'confirm' => 'Use Livewire Alert confirm dialogs for explicit user decisions, destructive actions, and server-side handlers.',
        'inputs' => 'Collect text, email, number, select, radio, checkbox, and file input values with Livewire Alert prompts.',
        'loading' => 'Show non-dismissable Livewire Alert loading states and close them after long-running Livewire actions finish.',
        'updating' => 'Update an open Livewire Alert in place with fluent setters, polling, progress states, and job batch examples.',
        'flash' => 'Show Livewire Alert notifications after redirects by reading flashed session data in Livewire components.',
        'customization' => 'Customize Livewire Alert images, CSS classes, button order, and raw SweetAlert2 options.',
        'dependency-injection' => 'Use dependency injection with the LivewireAlert service instead of facade calls in Livewire components.',
        default => 'Documentation for the livewire-alert package: fluent SweetAlert2 notifications for Laravel Livewire.',
    };

    $pageTitle = trim($__env->yieldContent('title'));
    $fullTitle = $pageTitle !== '' ? "{$pageTitle} - Livewire Alert" : 'Livewire Alert - Documentation';
    $canonicalUrl = url($current === '' ? '/' : "/{$current}");
    $socialImage = asset('android-chrome-512x512.png');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $fullTitle }}</title>

    <meta name="description" content="{{ $pageDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Livewire Alert">
    <meta property="og:title" content="{{ $fullTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $socialImage }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $fullTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $socialImage }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#111113">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @fluxAppearance
</head>
@php
    $navSections = [
        'Getting Started' => [
            ['Overview', '/'],
            ['Installation', '/installation'],
            ['Basic Usage', '/basic-usage'],
        ],
        'Core Patterns' => [
            ['Toast Notifications', '/toasts'],
            ['Timers', '/timers'],
            ['Buttons', '/buttons'],
            ['Button Events', '/button-events'],
            ['Confirm Dialog', '/confirm'],
            ['Inputs', '/inputs'],
        ],
        'Advanced' => [
            ['Loading States', '/loading'],
            ['Updating Alerts', '/updating'],
            ['Flash Alerts', '/flash'],
            ['Customization', '/customization'],
            ['Dependency Injection', '/dependency-injection'],
        ],
        'Resources' => [
            ['SweetAlert2', 'https://sweetalert2.github.io/', true],
            ['GitHub', 'https://github.com/jantinnerezo/livewire-alert', true],
        ],
    ];

    $versionOptions = [
        [
            'label' => 'Version 4.x',
            'tag' => 'Current',
            'href' => '/',
            'current' => true,
        ],
        [
            'label' => 'Version 3.x',
            'tag' => 'v3.0.3',
            'href' => 'https://github.com/jantinnerezo/livewire-alert/blob/v3.0.3/README.md',
            'current' => false,
        ],
        [
            'label' => 'Version 2.x',
            'tag' => '2.2.7',
            'href' => 'https://github.com/jantinnerezo/livewire-alert/blob/2.2.7/README.md',
            'current' => false,
        ],
        [
            'label' => 'Version 1.x',
            'tag' => '1.2.0',
            'href' => 'https://github.com/jantinnerezo/livewire-alert/blob/1.2.0/README.md',
            'current' => false,
        ],
    ];

    $toc = match ($current) {
        'installation' => [
            ['Install the package', 'install-the-package'],
            ['Publish the config', 'publish-the-config-optional'],
            ['Install SweetAlert2', 'install-sweetalert2-via-npm'],
            ['CDN option', 'or-via-cdn'],
            ['Filament', 'filament'],
        ],
        'basic-usage' => [
            ['Hello world', 'hello-world'],
            ['Adding text', 'adding-text'],
            ['Icons', 'icons'],
            ['Position', 'position'],
        ],
        'toasts' => [
            ['asToast()', 'astoast'],
            ['Manual toast', 'manual-toast'],
            ['Choosing a position', 'choosing-a-position'],
        ],
        'timers' => [
            ['Timer', 'timer'],
            ['Progress bar', 'timer-progress-bar'],
            ['Disable timer', 'disable-the-timer'],
        ],
        'buttons' => [
            ['Button types', 'button-types'],
            ['Button text', 'button-text'],
            ['Button colors', 'button-colors'],
        ],
        'button-events' => [
            ['onConfirm()', 'onconfirm'],
            ['onDismiss()', 'ondismiss'],
            ['onDeny()', 'ondeny'],
            ['Using them together', 'using-them-together'],
        ],
        'confirm' => [
            ['asConfirm()', 'asconfirm'],
            ['Handling events', 'handling-events'],
        ],
        'inputs' => [
            ['Text input', 'text-input'],
            ['Email and number', 'email-and-number'],
            ['Select and radio', 'select-and-radio'],
            ['Checkbox and file', 'checkbox-and-file'],
            ['Handling values', 'handling-values'],
        ],
        'loading' => [
            ['asLoading()', 'asloading'],
            ['Custom title', 'custom-title'],
            ['Full lifecycle', 'full-lifecycle'],
        ],
        'updating' => [
            ['Fluent form', 'fluent-form'],
            ['Explicit payload', 'explicit-payload-form'],
            ['Live progress', 'live-progress'],
            ['Laravel job batch', 'real-laravel-job-batch'],
        ],
        'flash' => [
            ['Flash alert', 'flash-alert'],
            ['Redirect flow', 'redirect-flow'],
        ],
        'customization' => [
            ['Image', 'image'],
            ['Custom classes', 'custom-css-classes'],
            ['Reverse buttons', 'reverse-buttons'],
            ['Options', 'options'],
        ],
        'dependency-injection' => [
            ['Inject the alert', 'inject-the-alert'],
            ['When to use it', 'when-to-use-it'],
        ],
        default => [
            ['Try it', 'try-it'],
            ["What's inside?", 'whats-inside'],
        ],
    };

    $isActive = function (string $path) use ($current): bool {
        $normalized = trim($path, '/');

        return ($normalized === '' && $current === '') || $normalized === $current;
    };
@endphp
<body class="min-h-screen bg-[#111113] font-sans text-zinc-100 antialiased selection:bg-rose-500/30 selection:text-white">
    <header class="sticky top-0 z-40 border-b border-white/10 bg-[#111113]/90 backdrop-blur-xl">
        <div class="mx-auto flex h-16 max-w-[96rem] items-center gap-5 px-4 sm:px-6 lg:px-8">
            <a href="/" wire:navigate class="flex min-w-0 items-center gap-3">
                <img
                    src="{{ asset('android-chrome-512x512.png') }}"
                    alt="Livewire Alert"
                    class="size-10 shrink-0"
                >
                <span class="truncate text-sm font-bold uppercase tracking-[0.18em] text-white sm:text-base">
                    Livewire Alert
                </span>
            </a>

            <nav class="hidden items-center gap-1 md:flex">
                <a href="/" wire:navigate class="rounded-full bg-rose-400/10 px-4 py-2 text-sm font-semibold text-rose-200 ring-1 ring-rose-300/15">
                    Docs
                </a>
                <a href="https://sweetalert2.github.io/" target="_blank" rel="noopener" class="rounded-full px-4 py-2 text-sm font-semibold text-zinc-400 transition hover:text-white">
                    SweetAlert2
                </a>
                <a href="https://github.com/jantinnerezo/livewire-alert" target="_blank" rel="noopener" class="rounded-full px-4 py-2 text-sm font-semibold text-zinc-400 transition hover:text-white">
                    GitHub
                </a>
            </nav>

            <livewire:docs-search />

        </div>

        <nav class="flex gap-2 overflow-x-auto border-t border-white/10 px-4 py-2 text-sm md:hidden">
            @foreach ($navSections as $links)
                @foreach ($links as $item)
                    @php
                        [$label, $path] = $item;
                        $external = $item[2] ?? false;
                    @endphp
                    <a
                        href="{{ $path }}"
                        @if ($external) target="_blank" rel="noopener" @else wire:navigate @endif
                        @class([
                            'shrink-0 rounded-full px-3 py-1.5 font-medium',
                            'bg-rose-400/10 text-rose-200' => !$external && $isActive($path),
                            'text-zinc-400' => $external || !$isActive($path),
                        ])
                    >
                        {{ $label }}
                    </a>
                @endforeach
            @endforeach
        </nav>
    </header>

    <div class="mx-auto grid min-h-[calc(100vh-4rem)] max-w-[96rem] grid-cols-1 lg:grid-cols-[18rem_minmax(0,1fr)] xl:grid-cols-[18rem_minmax(0,52rem)_18rem]">
        <aside class="hidden border-r border-white/10 lg:block">
            <div class="sticky top-16 h-[calc(100vh-4rem)] overflow-y-auto px-5 py-8">
                <details class="group relative mb-9">
                    <summary class="flex h-11 w-full cursor-pointer list-none items-center justify-between rounded-lg border border-white/10 bg-zinc-900/80 px-4 text-sm font-medium text-zinc-300 transition hover:border-white/15 hover:bg-zinc-900 [&::-webkit-details-marker]:hidden">
                        <span>Version 4.x</span>
                        <svg class="size-4 text-zinc-500 transition group-open:rotate-180" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </summary>

                    <div class="absolute left-0 right-0 z-20 mt-2 overflow-hidden rounded-lg border border-white/10 bg-zinc-950/95 p-1 shadow-2xl shadow-black/30 backdrop-blur">
                        @foreach ($versionOptions as $version)
                            <a
                                href="{{ $version['href'] }}"
                                @if ($version['current']) wire:navigate @endif
                                @class([
                                    'flex items-center justify-between rounded-md px-3 py-2 text-sm font-medium transition',
                                    'bg-rose-400/10 text-rose-200' => $version['current'],
                                    'text-zinc-400 hover:bg-zinc-900 hover:text-white' => ! $version['current'],
                                ])
                            >
                                <span>{{ $version['label'] }}</span>
                                <span @class([
                                    'text-[11px] font-semibold',
                                    'text-rose-200/70' => $version['current'],
                                    'text-zinc-600' => ! $version['current'],
                                ])>
                                    {{ $version['tag'] }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </details>

                <nav class="space-y-8">
                    @foreach ($navSections as $heading => $links)
                        <section>
                            <h2 class="mb-3 px-1 text-xs font-bold uppercase tracking-[0.16em] text-zinc-600">
                                {{ $heading }}
                            </h2>

                            <ul class="space-y-1">
                                @foreach ($links as $item)
                                    @php
                                        [$label, $path] = $item;
                                        $external = $item[2] ?? false;
                                        $active = !$external && $isActive($path);
                                    @endphp
                                    <li>
                                        <a
                                            href="{{ $path }}"
                                            @if ($external) target="_blank" rel="noopener" @else wire:navigate @endif
                                            @class([
                                                'group relative block rounded-lg px-3 py-2 text-sm font-medium transition',
                                                'bg-zinc-800/80 text-white' => $active,
                                                'text-zinc-400 hover:bg-zinc-900/60 hover:text-zinc-100' => !$active,
                                            ])
                                        >
                                            {{ $label }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    @endforeach
                </nav>
            </div>
        </aside>

        <main class="min-w-0 px-5 py-10 sm:px-8 lg:px-10 lg:py-14">
            {{ $slot }}
        </main>

        <aside class="hidden border-l border-white/10 xl:block">
            <div class="sticky top-16 h-[calc(100vh-4rem)] overflow-y-auto px-7 py-14">
                <h2 class="mb-5 text-xs font-bold uppercase tracking-[0.16em] text-zinc-600">On This Page</h2>

                <nav class="mb-8 space-y-3">
                    @foreach ($toc as [$label, $id])
                        <a href="#{{ $id }}" class="block text-sm font-medium text-zinc-500 transition hover:text-rose-200">
                            {{ $label }}
                        </a>
                    @endforeach
                </nav>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-zinc-900/70">
                    <div class="border-b border-white/10 bg-amber-300/10 px-4 py-3">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-amber-200">Package Pulse</p>
                    </div>
                    <div class="space-y-4 p-4 text-sm">
                        <div>
                            <a href="https://packagist.org/packages/jantinnerezo/livewire-alert" target="_blank" rel="noopener" class="font-semibold text-white transition hover:text-rose-200">
                                jantinnerezo/livewire-alert
                            </a>
                            <p class="mt-1 text-zinc-500">README-backed package status.</p>
                        </div>

                        <div class="grid gap-2">
                            <a href="https://github.com/jantinnerezo/livewire-alert/actions" target="_blank" rel="noopener" class="inline-flex">
                                <img src="https://github.com/jantinnerezo/livewire-alert/workflows/PHPUnit/badge.svg" alt="Build Status" class="h-5 max-w-full">
                            </a>
                            <a href="https://github.com/jantinnerezo/livewire-alert/actions" target="_blank" rel="noopener" class="inline-flex">
                                <img src="https://github.com/jantinnerezo/livewire-alert/workflows/PHPStan/badge.svg" alt="PHPStan Analysis" class="h-5 max-w-full">
                            </a>
                            <a href="https://packagist.org/packages/jantinnerezo/livewire-alert" target="_blank" rel="noopener" class="inline-flex">
                                <img src="https://img.shields.io/packagist/dt/jantinnerezo/livewire-alert" alt="Total Downloads" class="h-5 max-w-full">
                            </a>
                            <a href="https://packagist.org/packages/jantinnerezo/livewire-alert" target="_blank" rel="noopener" class="inline-flex">
                                <img src="https://img.shields.io/packagist/l/jantinnerezo/livewire-alert" alt="License" class="h-5 max-w-full">
                            </a>
                        </div>

                        <dl class="space-y-2 border-t border-white/10 pt-4 text-xs">
                            <div class="flex justify-between gap-3">
                                <dt class="text-zinc-500">PHP</dt>
                                <dd class="font-medium text-emerald-300">8.1+</dd>
                            </div>
                            <div class="flex justify-between gap-3">
                                <dt class="text-zinc-500">Laravel</dt>
                                <dd class="font-medium text-emerald-300">10.x+</dd>
                            </div>
                            <div class="flex justify-between gap-3">
                                <dt class="text-zinc-500">Livewire</dt>
                                <dd class="font-medium text-emerald-300">3.x / 4.x</dd>
                            </div>
                            <div class="flex justify-between gap-3">
                                <dt class="text-zinc-500">Install</dt>
                                <dd class="font-mono text-[11px] text-rose-200">composer</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </aside>
    </div>

    @fluxScripts
</body>
</html>

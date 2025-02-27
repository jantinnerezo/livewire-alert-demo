<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $title ?? '' }}
        {{ ' - ' . app(\App\Domain\Event\Services\CurrentEvent::class)->get()?->name }}
    </title>

    <link rel="icon" type="image/x-icon" href="{{ Vite::image('favicon.ico') }}">

    @livewireStyles
    @filamentStyles
    @vite(['resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-avenirnextltpro">
    <div>
        @livewire('components.header')
        @livewire('components.navigation')
        <div class="container">
            <div class="flex flex-wrap w-full">
                <div class="relative w-full sm:w-1/4 hidden lg:block">
                    @livewire('components.profile', ['participant' => auth()->user()])
                    @livewire('components.participants')
                </div>
                <div class="w-full sm:w-3/4">
                    <div class="w-full p-3 md:p-[3rem] pr-0">
                        <h2
                            class="text-[28px] md:text-[48px] uppercase leading-[58px] font-avenirnextltpro font-700 mb-0 text-primary">
                            {{ $title ?? '' }}
                        </h2>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('notifications')

    @livewireScriptConfig
    @filamentScripts

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

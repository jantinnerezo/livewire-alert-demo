<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @hasSection('title')
            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <meta name="keywords" content="Laravel, Laravel Livewire, Livewire Alert, SweetAlert2, alert, Tailwind"/>
        <meta name="description" content="This package provides a simple alert utilities for your livewire components.">
        <meta name="subject" content="Livewire Alert">
        <meta name="copyright" content="Jantinn Erezo">
        <meta name="robots" content="index,follow" />

        <!-- Open Graph -->
        <meta name="og:title" content="{{ config('app.name') }}"/>
        <meta name="og:type" content="website"/>
        <meta name="og:url" content="https://livewire-alert.jantinnerezo.com/"/>
        <meta name="og:image" content="https://repository-images.githubusercontent.com/272130835/4db85f80-4524-11eb-9a4c-b52cece2cf4b"/>
        <meta name="og:site_name" content="{{ config('app.name') }}"/>
        <meta name="og:description" content="This package provides a simple alert utilities for your livewire components."/>

        <!-- Twitter -->
        <meta name="twitter:card" content="https://repository-images.githubusercontent.com/272130835/4db85f80-4524-11eb-9a4c-b52cece2cf4b">
        <meta name="twitter:site" content="{{ config('app.name') }}">
        <meta name="twitter:creator" content="Jantinn Erezo">
        <meta name="twitter:title" content="{{ config('app.name') }}">
        <meta name="twitter:description" content="This package provides a simple alert utilities for your livewire components.">
        <meta name="twitter:image:src" content="https://repository-images.githubusercontent.com/272130835/4db85f80-4524-11eb-9a4c-b52cece2cf4b">

        <link rel="shortcut icon" type="image/x-heroicon" href="{{ asset('static/logo/app-logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @bukStyles(true)
        @livewireStyles
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-XG8N1CZ7TS"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-XG8N1CZ7TS');
        </script>

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/styles/default.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/highlight.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    </head>
    <body class="bg-cool-gray-50">
        @yield('body')
        <script src="{{ mix('js/app.js') }}"></script>

        @livewireScripts
        @bukScripts(true)
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <x-livewire-alert::scripts />
        @stack('scripts')
    </body>
</html>
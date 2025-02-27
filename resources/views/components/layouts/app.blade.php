<!DOCTYPE html>
<html 
    lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
    data-theme="dracula"
>
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

        <link rel="icon" href="{{ asset('favicon.ico') }}" />
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}" />
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-PQR4W43B8V"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-PQR4W43B8V');
        </script>
    </head>

    <body>
        {{ $slot }}
    </body>
</html>

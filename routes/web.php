<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $badges = [
        [
            'alt' => 'Build Status',
            'href' => 'https://github.com/jantinnerezo/livewire-alert/actions',
            'src' => 'https://github.com/jantinnerezo/livewire-alert/workflows/PHPUnit/badge.svg'
        ],
        [
            'alt' => 'Latest Stable Version',
            'href' => '"https://packagist.org/packages/jantinnerezo/livewire-alert',
            'src' => 'https://img.shields.io/packagist/v/jantinnerezo/livewire-alert'
        ],
        [
            'alt' => 'Total Downloads',
            'href' => 'https://packagist.org/packages/jantinnerezo/livewire-alert',
            'src' => 'https://img.shields.io/packagist/dt/jantinnerezo/livewire-alert'
        ],
        [
            'alt' => 'License',
            'href' => 'https://packagist.org/packages/jantinnerezo/livewire-alert',
            'src' => 'https://img.shields.io/packagist/l/jantinnerezo/livewire-alert'
        ]
    ];

    return view('index')->with(['badges' => $badges]);
});


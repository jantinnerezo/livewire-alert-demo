<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $badges = [
        [
            'alt' => 'Latest Stable Version',
            'href' => '//packagist.org/packages/jantinnerezo/livewire-alert',
            'src' => 'https://poser.pugx.org/jantinnerezo/livewire-alert/v'
        ],
        [
            'alt' => 'Total Downloads',
            'href' => '//packagist.org/packages/jantinnerezo/livewire-alert',
            'src' => 'https://poser.pugx.org/jantinnerezo/livewire-alert/downloads'
        ],
        [
            'alt' => 'License',
            'href' => '//packagist.org/packages/jantinnerezo/livewire-alert',
            'src' => 'https://poser.pugx.org/jantinnerezo/livewire-alert/license'
        ]
    ];

    return view('index')->with(['badges' => $badges]);
});


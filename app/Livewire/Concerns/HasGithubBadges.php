<?php

declare(strict_types=1);

namespace App\Livewire\Concerns;

trait HasGithubBadges
{
    public array $githubBadges = [
        [
            'alt' => 'Build Status',
            'href' => 'https://github.com/jantinnerezo/livewire-alert/actions',
            'src' => 'https://github.com/jantinnerezo/livewire-alert/workflows/PHPUnit/badge.svg'
        ],
        [
            'alt' => 'Stars',
            'href' => 'https://github.com/jantinnerezo/livewire-alert',
            'src' => 'https://img.shields.io/github/stars/jantinnerezo/livewire-alert'
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
}
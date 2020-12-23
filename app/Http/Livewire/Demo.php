<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Demo extends Component
{
    public function fire()
    {
        $this->alert('success', 'Testing');
        $this->alert('success', 'Testing');
        $this->alert('success', 'Testing');
        $this->alert('success', 'Testing');
        $this->alert('success', 'Testing');
        $this->alert('success', 'Testing');
    }

    public function getBadgesProperty()
    {
        return [
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
    }

    public function render()
    {
        return view('livewire.demo', [
            'badges' => $this->badges
        ])->extends('layouts.app');
    }
}

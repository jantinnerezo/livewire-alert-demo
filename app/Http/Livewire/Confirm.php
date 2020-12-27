<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Confirm extends Component
{
    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    public function triggerConfirm()
    {
        $this->confirm('Do you love Livewire Alert?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Nope',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function confirmed()
    {
        $this->alert('success', 'Thanks! consider giving it a star on github.');
    }

    public function cancelled()
    {
        $this->alert('info', 'Understood');
    }

    public function render()
    {
        return view('livewire.confirm');
    }
}

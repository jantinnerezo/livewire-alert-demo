<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $status = 'success';
    public $message = 'Hello World!';
    public $text;
    public $config = [
        'position'  =>  'top-end',
        'timer'  =>  3000,
        'toast'  =>  true,
        'text' => '',
        'showCancelButton'  =>  true,
        'showConfirmButton'  =>  false
    ];
    public $flash = false;

    public function getStatusesProperty()
    {
        return [
            'success',
            'info',
            'warning',
            'error'
        ];
    }

    public function getPositionsProperty()
    {
        return [
            'top',
            'top-start',
            'top-end',
            'center',
            'center-start',
            'center-end',
            'bottom',
            'bottom-start',
            'bottom-end'
        ];
    }

    public function showAlert()
    {
        if (!$this->flash) {
            $this->alert(
                $this->status,
                $this->message,
                $this->config
            );

            return;
        }

        $this->flash(
            $this->status,
            $this->message,
            $this->config
        );

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.alert', [
            'statuses' => $this->statuses,
            'positions' => $this->positions
        ]);
    }
}

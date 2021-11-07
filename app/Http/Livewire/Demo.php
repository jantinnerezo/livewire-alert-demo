<?php

namespace App\Http\Livewire;

use Illuminate\Support\Arr;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Demo extends Component
{   
    use LivewireAlert;

    public $status = 'success';

    public $flash = false;

    public $title = 'Hello!';

    public $responses = [
        'confirmed' => null,
        'denied' => null,
        'dismissed' => null,
        'progressFinished' => null
    ];

    public $configuration = [
        'position'  =>  'center',
        'timer'  =>  3000,
        'toast'  =>  true
    ];

    public function getGeneratedConfigProperty()
    {
        $config = '';

        $config .= $this->flash ? 
            '$this->flash(' . "'" . $this->status . "'," : '$this->alert(' . "'" . $this->status . "', ";

        $config .= "'" . $this->title . "', ";

        $config .= "[\n";

        foreach ($this->configuration as $key => $configuration) {
            if (is_string($configuration)) {
                $configuration = "'{$configuration}'";
            }

            if (is_bool($configuration)) {
                $configuration = $configuration ? "true" : "false";
            }

            $config .= "\t'{$key}' => {$configuration},\n";
        }

        $config .= ']);';

        return strval($config);
    }

    public function getStatusesProperty()
    {
        return [
            'success' => [
                'text-color' => 'text-green-600',
                'bg-color' => 'bg-green-50',
                'border-color' => 'border-green-600'
            ],
            'info' => [
                'text-color' => 'text-light-blue-600',
                'bg-color' => 'bg-light-blue-50',
                'border-color' => 'border-light-blue-600'
            ],
            'warning' => [
                'text-color' => 'text-yellow-600',
                'bg-color' => 'bg-yellow-50',
                'border-color' => 'border-yellow-600'
            ],
            'error' => [
                'text-color' => 'text-red-600',
                'bg-color' => 'bg-red-50',
                'border-color' => 'border-red-600'
            ]
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

    public function getSelectedButtonsProperty()
    {
        $buttons = [];

        if (Arr::get($this->configuration, 'showConfirmButton')) {
            Arr::set($this->configuration, 'onConfirmed', '');
            $buttons[] = 'Confirm';
        }

        if (Arr::get($this->configuration, 'showDenyButton')) {
            Arr::set($this->configuration, 'onDenied', '');
            $buttons[] = 'Deny';
        }

        if (Arr::get($this->configuration, 'showCancelButton')) {
            Arr::set($this->configuration, 'onDismissed', '');
            $buttons[] = 'Cancel';
        }

        return count($buttons) > 0 ? implode(',', $buttons) : 'No buttons';
    }

    public function getListeners()
    {
        return [
            'confirmed',
            'denied',
            'dismissed',
            'progressFinished',
            'testConfirmed'
        ];  
    }

    public function setConfiguration($key, $value)
    {
        $this->configuration[$key] = $value;
    }

    public function showAlert()
    {
        if (! $this->flash) {
            $this->alert(
                $this->status,
                $this->title,
                $this->configuration
            );

            return;
        }

        $this->flash(
            $this->status,
            $this->title,
            $this->configuration
        );
    }

    public function render()
    {
        return view('livewire.demo');
    }
}

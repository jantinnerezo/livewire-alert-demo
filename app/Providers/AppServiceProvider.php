<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Livewire\Component;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro('ask', function ($title, $options = []) {
            $identifier = (string) Str::uuid();

            $this->dispatchBrowserEvent('asking', $identifier);

            $this->dispatchBrowserEvent($identifier, [
                'options' => collect($options)->except([
                    'onConfirmed',
                    'onCancelled'
                ])->toArray(),
                'onConfirmed' => $options['onConfirmed'],
                'onCancelled' => $options['onCancelled'],
            ]);
        });
    }
}

<?php

namespace Tests\Feature;

use App\Http\Livewire\Demo;
use Jantinnerezo\LivewireAlert\Exceptions\AlertException;
use Livewire\Livewire;
use Tests\TestCase;

class DemoTest extends TestCase
{
    public function testBasicAlert(): void
    {
        Livewire::test(Demo::class)
            ->call('showAlert')
            ->assertDispatchedBrowserEvent('alert');
    }

    public function testBasicFlashAlert(): void
    {
        Livewire::test(Demo::class)
            ->set('flash', true)
            ->call('showAlert')
            ->assertRedirect('/')
            ->assertSessionHas('livewire-alert');
    }

    public function testAlertConfirm(): void
    {
        Livewire::test(Demo::class)
            ->set('configuration.showConfirmButton', true)
            ->call('showAlert')
            ->assertDispatchedBrowserEvent('alert');
    }

    public function testAlertDenied(): void
    {
        Livewire::test(Demo::class)
            ->set('configuration.showDenyButton', true)
            ->set('configuration.onDenied', 'denied')
            ->call('showAlert')
            ->assertDispatchedBrowserEvent('alert');
    }

    public function testAlertDismissed(): void
    {
        Livewire::test(Demo::class)
            ->set('configuration.showCancelButton', true)
            ->set('configuration.onDismissed', 'dismissed')
            ->call('showAlert')
            ->assertDispatchedBrowserEvent('alert');
    }

    public function testProgressDismissal(): void
    {
        Livewire::test(Demo::class)
            ->set('configuration.timerProgressBar', true)
            ->set('configuration.timer', 3000)
            ->set('configuration.onProgressFinished', 'progressFinished')
            ->call('showAlert')
            ->assertDispatchedBrowserEvent('alert');
    }

    public function testExceptionIsThrownWhenIconIsInvalid()
    {
        $invalidIcon = 'failed';
        
        $this->expectException(AlertException::class);
        $this->expectExceptionMessage("Invalid '{$invalidIcon}' alert icon.");

        Livewire::test(Demo::class)
            ->set('status', $invalidIcon)
            ->call('showAlert');
    }
}
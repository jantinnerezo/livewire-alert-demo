<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;

class AlertTest extends TestCase
{
    /** @test  */
    public function test_demo_page_contains_alert_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('alert');
    }

    /** @test  */
    public function test_alert_livewire_component_contains_proper_title()
    {
        Livewire::test('alert')
            ->assertSee('Displaying alerts');
    }

    /** @test  */
    public function can_show_alert()
    {
        Livewire::test('alert')
            ->set('flash', false)
            ->call('showAlert')
            ->assertDispatchedBrowserEvent('alert');
    }

    /** @test  */
    public function can_show_flash()
    {
        Livewire::test('alert')
            ->set('flash', true)
            ->call('showAlert')
            ->assertRedirect('/')
            ->assertSessionHas('livewire-alert');
    }
}

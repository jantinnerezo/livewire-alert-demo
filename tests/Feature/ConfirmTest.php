<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;

class ConfirmTest extends TestCase
{
    /** @test  */
    public function test_demo_page_contains_confirm_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('confirm');
    }

    /** @test  */
    public function test_confirm_livewire_component_contains_proper_title()
    {
        Livewire::test('confirm')
            ->assertSee('Alert Confirmation');
    }

    /** @test  */
    public function test_can_show_confirmation()
    {
        Livewire::test('confirm')
            ->call('triggerConfirm')
            ->assertDispatchedBrowserEvent('confirming');
    }

    /** @test  */
    public function test_did_confirmed_confirmation()
    {
        Livewire::test('confirm')
            ->call('triggerConfirm')
            ->emit('confirmed')
            ->assertDispatchedBrowserEvent('alert');
    }

    /** @test  */
    public function test_did_cancelled_confirmation()
    {
        Livewire::test('confirm')
            ->call('triggerConfirm')
            ->emit('cancelled')
            ->assertDispatchedBrowserEvent('alert');
    }
}

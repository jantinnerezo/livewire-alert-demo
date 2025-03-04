<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire;

use PHPUnit\Framework\Attributes\Test;
use App\Livewire\Demo;
use Livewire\Livewire;
use Tests\TestCase;

class DemoTest extends TestCase
{
    #[Test]
    public function it_renders_successfully(): void
    {
        Livewire::test(Demo::class)
            ->assertStatus(200);
    }

    #[Test]
    public function it_can_show_alert(): void
    {
        Livewire::test(Demo::class)
            ->call('showAlert')
            ->assertSee('Hello World')
            ->assertSee('This is a demo of Livewire Alert.');
    }

    #[Test]
    public function it_can_show_alert_with_custom_options(): void
    {
        Livewire::test(Demo::class)
            ->call('updateOptions', [
                'title' => 'Custom Title',
                'text' => 'Custom Text',
            ])
            ->call('showAlert')
            ->assertSee('Custom Title')
            ->assertSee('Custom Text');
    }

    #[Test]
    public function it_can_see_default_generated_code(): void
    {
        Livewire::test(Demo::class)
            ->assertSee('/* Hit show alert or toast to generate code */');
    }

    #[Test]
    public function it_can_generate_code_on_show_alert(): void
    {
        Livewire::test(Demo::class)
            ->call('showAlert')
            ->assertViewHas('code', function ($code) {
                return str($code)
                    ->contains('LivewireAlert::title') &&
                    str($code)->contains('show()');
            });
    }
}
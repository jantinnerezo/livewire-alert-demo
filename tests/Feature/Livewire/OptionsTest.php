<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire;

use App\Livewire\Options;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OptionsTest extends TestCase
{
    #[Test]
    public function component_exists_on_the_page(): void
    {
        $this->get('/')
            ->assertSeeLivewire(Options::class);
    }

    #[Test]
    public function component_renders(): void
    {
        Livewire::test(Options::class)
            ->assertSee([
                'Title',
                'Text',
                'Show confirm button',
            ]);
    }   

    #[Test]
    public function dispatches_update(): void
    {
        Livewire::test(Options::class)
            ->set('options.title', 'Hello World')
            ->assertDispatched('updateOptions');
    }   
}
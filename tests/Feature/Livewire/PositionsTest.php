<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire;

use App\Livewire\Positions;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PositionsTest extends TestCase
{
    #[Test]
    public function component_exists_on_the_page(): void
    {
        $this->get('/')
            ->assertSeeLivewire(Positions::class);
    }

    #[Test]
    public function component_renders(): void
    {
        Livewire::test(Positions::class)
            ->assertSee([
                'Position',
            ]);
    }   

    #[Test]
    public function dispatches_update(): void
    {
        Livewire::test(Positions::class)
            ->set('position', Position::TopStart->value)
            ->assertDispatched('updateOptions');
    }   
}
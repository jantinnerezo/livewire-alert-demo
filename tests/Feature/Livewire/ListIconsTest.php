<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire;

use App\Livewire\ListIcons;
use Jantinnerezo\LivewireAlert\Enums\Icon;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ListIconsTest extends TestCase
{
    #[Test]
    public function component_exists_on_the_page(): void
    {
        $this->get('/')
            ->assertSeeLivewire(ListIcons::class);
    }

    #[Test]
    public function component_renders(): void
    {
        Livewire::test(ListIcons::class)
            ->assertSee('Icon');
    }   

    #[Test]
    public function dispatches_update(): void
    {
        Livewire::test(ListIcons::class)
            ->set('icon', Icon::Success->value)
            ->assertDispatched('updateOptions');
    }   
}
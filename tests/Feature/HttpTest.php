<?php

declare(strict_types=1);

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HttpTest extends TestCase
{
    #[Test]
    public function can_visit_demo_page(): void
    {
        $this->get('/')->assertStatus(200);
    }

    #[Test]
    public function can_see_title(): void
    {
        $this->get('/')->assertSee(config('app.name'));
    }

    #[Test]
    public function can_render_badges(): void
    {
        $this->get('/')
            ->assertSee([
                'Build Status',
                'Stars',
                'Latest Stable Version',
                'Total Downloads',
                'License'
            ]);
    }

    #[Test]
    public function can_render_livewire_demo_component(): void
    {
        $this->get('/')->assertSeeLivewire('demo');
    }

    #[Test]
    public function can_see_show_alert_button(): void
    {
        $this->get('/')
            ->assertSee('Show Alert');
    }

    #[Test]
    public function can_see_show_toast_button(): void
    {
        $this->get('/')
            ->assertSee('Show Toast');
    }
}

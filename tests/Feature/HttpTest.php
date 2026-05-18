<?php

declare(strict_types=1);

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HttpTest extends TestCase
{
    #[Test]
    public function can_visit_docs_home_page(): void
    {
        $this->get('/')->assertStatus(200);
    }

    #[Test]
    public function can_visit_installation_page(): void
    {
        $this->get('/installation')->assertStatus(200);
    }

    #[Test]
    public function can_visit_timer_page(): void
    {
        $this->get('/timers')->assertStatus(200);
    }

    #[Test]
    public function docs_pages_render_seo_metadata(): void
    {
        $paths = [
            '/',
            '/installation',
            '/basic-usage',
            '/toasts',
            '/timers',
            '/buttons',
            '/button-events',
            '/confirm',
            '/inputs',
            '/loading',
            '/updating',
            '/flash',
            '/customization',
            '/dependency-injection',
        ];

        foreach ($paths as $path) {
            $this->get($path)
                ->assertStatus(200)
                ->assertSee('<title>', false)
                ->assertSee('name="description"', false)
                ->assertSee('rel="canonical"', false)
                ->assertSee($path, false)
                ->assertSee('property="og:title"', false)
                ->assertSee('property="og:description"', false)
                ->assertSee('name="twitter:card"', false);
        }
    }

    #[Test]
    public function docs_header_links_to_sweetalert2(): void
    {
        $this->get('/')
            ->assertSee('SweetAlert2')
            ->assertSee('https://sweetalert2.github.io/', false);
    }

    #[Test]
    public function docs_show_readme_package_pulse(): void
    {
        $this->get('/')
            ->assertSee('Package Pulse')
            ->assertSee('jantinnerezo/livewire-alert')
            ->assertSee('Build Status')
            ->assertSee('PHPStan Analysis')
            ->assertSee('Total Downloads')
            ->assertSee('License');
    }
}

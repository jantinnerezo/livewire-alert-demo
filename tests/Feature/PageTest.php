<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageTest extends TestCase
{
    /** @test  */
    public function can_visit_demo_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test  */
    public function test_nav_component_can_be_rendered()
    {
        $view = $this->blade('<x-nav />');

        $view->assertSee('Github');
    }

    /** @test  */
    public function test_intro_component_can_be_rendered()
    {
        $view = $this->blade('<x-intro :badges="$badges" />', [
            'badges' => []
        ]);

        $view->assertSee('Livewire Alert');
    }

    /** @test  */
    public function test_installation_component_can_be_rendered()
    {
        $view = $this->blade('<x-installation />');

        $view->assertSee('Installation');
        $view->assertSeeInOrder([
            'composer',
            'require jantinnerezo/livewire-alert'
        ]);
    }

    /** @test  */
    public function test_requirements_component_can_be_rendered()
    {
        $view = $this->blade('<x-requirements />');

        $view->assertSee('Requirements');

        $view->assertSeeInOrder([
            'PHP 7.2 or higher',
            'Laravel 7, 8',
            'Livewire',
            'SweetAlert2'
        ]);
    }

    /** @test  */
    public function test_usage_component_can_be_rendered()
    {
        $view = $this->blade('<x-usage />');

        $view->assertSeeInOrder([
            'Include Component',
            'Publish Config File',
            'php',
            'artisan vendor:publish --provider=',
            'Jantinnerezo\LivewireAlert\LivewireAlertServiceProvider',
            '--tag=',
            'config'
        ]);
    }

    /** @test  */
    public function test_footer_component_can_be_rendered()
    {
        $view = $this->blade('<x-footer />');

        $view->assertSeeInOrder([
            '© Livewire Alert',
            now()->format('Y'),
            'Built with',
            'Laravel Livewire',
            'Tailwind CSS'
        ]);
    }
}

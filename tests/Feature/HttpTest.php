<?php

namespace Tests\Feature;

use Tests\TestCase;

class HttpTest extends TestCase
{
    /** @test  */
    public function can_visit_demo_page()
    {
        $this->get('/')->assertStatus(200);
    }

    /** @test  */
    public function can_see_title()
    {
        $this->get('/')->assertSee(config('app.name'));
    }

    /** @test */
    public function can_render_badges()
    {
        $this->get('/')
            ->assertSee([
                'Latest Stable Version',
                'Total Downloads',
                'License'
            ]);
    }

    /** @test */
    public function can_render_livewire_demo_component()
    {
        $this->get('/')->assertSeeLivewire('demo');
    }

    /** @test */
    public function can_see_alert_types()
    {
        $this->get('/')
            ->assertSee([
                'success',
                'info',
                'warning',
                'error'
            ]);
    }

    /** @test */
    public function can_see_input_field_labels()
    {
        $this->get('/')
            ->assertSee([
                'Title',
                'Text',
                'Position',
                'Duration',
                'Buttons',
                'Width',
                'Toast',
                'Show as flash',
                'Show Progress Bar'
            ]);
    }

    /** @test */
    public function can_see_submit_button()
    {
        $this->get('/')
            ->assertSee('Show Alert');
    }
}

<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NewTest extends DuskTestCase
{
    /**
     * @test
     * A Dusk test example.
     *
     * @return void
     */
    public function is_reaching_the_correct_test_port()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertPortIs('8000');
        });
    }
}

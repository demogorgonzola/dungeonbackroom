<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CharacterPageTest extends DuskTestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function can_view_characters()
    {
        //NOTE: dusk tests dont work without a live site running
        $this->browse(function (Browser $browser) {
            $response = $browser->visit('/character');

            $response->assertSee('Characters');
        });
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CharacterTest extends TestCase
{
    /** @test **/
    public function can_create_a_character()
    {
        $response = $this->get('character/create');

        $response->assertStatus(200);
    }
}

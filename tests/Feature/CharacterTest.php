<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CharacterTest extends TestCase
{
    /** @test **/
    public function can_navigative_to_the_characters_index()
    {
        $response = $this->get('/character');

        $response->assertStatus(200);
    }

    /** @test **/
    public function can_navigate_to_the_character_create()
    {
        $response = $this->get('character');

        $response->assertStatus(200);

    }
}

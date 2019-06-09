<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CharacterTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function can_create_a_character()
    {
        $this->withoutExceptionHandling();
        //Given
        $this->actingAs(factory('App\User')->create());

        $attributes = [
            'name' => 'Teem',
        ];

        //When
        $this->post('/dnd-characters', $attributes);

        //Then
        $this->assertDatabaseHas('dnd_characters', $attributes);
    }
}

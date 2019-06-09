<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CharacterTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function can_create_a_character()
    {
        $this->withoutExceptionHandling();
      //Given
      $this->actingAs(factory('App\User')->create());

      //When
      $this->post('/dnd-characters', [
        'name' => 'Teem'
      ]);

      //Then
      $this->assertDatabaseHas('dnd_characters', [
          'name' => 'Teem'
      ]);
    }
}

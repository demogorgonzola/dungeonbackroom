<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\DndCharacter;

class CharacterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function create_a_character()
    {
        // Given
        $character = [
            'name' => 'Great George',
            'class' => 'Druid',
        ];

        // When
        $response = $this->post('character', $character);

        // Then
        $response->assertStatus(200);
        $this->assertDatabaseHas('dnd_characters', $character);
    }

    /**
     * @test
     * @return void
     */
    public function change_a_characters_level()
    {
        // Given
        $character = factory(DndCharacter::class)->create([
            'level' => 10
        ]);
        $new_level = 11;

        // Then
        $response = $this->put("character/$character->id", [
            'level' => $new_level,
        ]);

        // When
        $response->assertStatus(200);
        $this->assertDatabaseHas('dnd_characters', [
            'id' => $character->id,
            'level' => $new_level
        ]);
    }

    /**
     * @test
     * @return void
     */
    public function display_many_characters()
    {
        $response = $this->get('/character');
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function add_xp_to_a_character()
    {
        $character = factory(DndCharacter::class)->create();

            // error_log($character->id);

        $this->put("character/$character->id", [
            'xp-gain' => 100,
        ]);

        $this->assertDatabaseHas('dnd_characters', [
            'xp' => 100,
        ]);
    }
}

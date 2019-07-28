<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Item;
use App\Character;

class ItemTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function store_an_item()
    {
        // Given
        $item = factory(Item::class)->make()->toArray();

        // When
        $response = $this->post('/item', $item);

        // Then
        $response->assertStatus(302);
        $this->assertDatabaseHas('items', $item);
    }

    /**
     * @test
     *
     * @return void
     */
    public function store_many_items()
    {
        // Given
        $items = factory(Item::class,5)->make();

        $response = $this->post('/item', [ 'items' => $items->toArray() ]);

        $items->each(function($item) {
            $this->assertDatabaseHas('items', $item->toArray());
        });
    }

    /**
     * @test
     * @return void
     */
    public function store_many_items_to_same_user()
    {
        // Given
        $character = factory(Character::class)->create();
        $items = factory(Item::class,5)->make([
            'character_id' => $character->id,
        ]);

        $response = $this->post('/item', [ 'items' => $items->toArray() ]);

        $items->each(function($item) {
            $this->assertDatabaseHas('items', $item->toArray());
        });
    }

    /**
     * @test
     *
     * @return void
     */
    public function character_can_hold_up_to_capacity()
    {
        // Given
        $character = factory(Character::class)->create([
            'str' => 10,
        ]);
        $item = factory(Item::class)->create([
            'weight' => 150,
            'character_id' => $character->id,
        ]);

        // When
        $response = $this->get('/item');

        // Then
        $response->assertStatus(200);
        $response->assertsee("id='character-{$character->id}' class='unencumbered");
    }

    /**
     * @test
     *
     * @return void
     */
    public function character_is_warned_when_carrying_beyond_capacity()
    {
        // Given
        $character = factory(Character::class)->create([
            'str' => 12, //Carry Capacity: 180
        ]);
        $item = factory(Item::class)->create([
            'weight' => 200,
            'character_id' => $character->id,
        ]);

        // When
        $response = $this->get('/item');

        // Then
        $response->assertStatus(200);
        $response->assertsee("id='character-{$character->id}' class='encumbered");
    }
}

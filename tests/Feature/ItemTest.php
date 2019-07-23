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
     *
     *
     * @return void
     */
    public function adhere_weight_restriction()
    {
        // Given
        $character = factory(Character::class)->create([
            'str' => 12, //Carry Capacity: 180
        ]);
        $items = factory(Item::class,10)->create([
            'weight' => 18,
            'character_id' => $character->id,
        ]); // Total Items Weight: 180

        // When
        $response = $this->get('/item');

        // Then
        $response->assertStatus(200);
        $response->assertSee($character->name);
        $items->each(function($item) use ($response) {
            $response->assertSee($item->name);
            $response->assertSee($item->weight);
        });
    }

    /**
     * @test
     *
     * @return void
     */
    public function violate_weight_restriction()
    {
        // Given
        $character = factory(Character::class)->create([
            'str' => 12, //Carry Capacity: 180
        ]);
        $items = factory(Item::class,10)->create([
            'weight' => 20,
            'character_id' => $character->id,
        ]); // Total Items Weight: 200

        // When
        $response = $this->get('/item');

        // Then
        $response->assertStatus(200);
        $response->assertSee($character->name);
        $items->each(function($item) use ($response) {
            $response->assertSee($item->name);
            $response->assertSee($item->weight);
        });
    }
}

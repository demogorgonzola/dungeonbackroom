<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Character;
use App\Logic\CharacterWeight as Weight;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //puke out the view data
        $items_by_character = Item::all()->groupBy('character.id');
        $character_item_stats = $items_by_character->map(function ($items) {
            $character = $items->first()->character;
            $simplified_items = $items->map(function ($item) {
                return $item->only('name', 'weight');
            });
            $carry_capacity = Weight::carryCapacity($character->str);
            $held_items_weight = Weight::totalWeightOfItems($items);
            $encumbered = ($held_items_weight > $carry_capacity);

            return collect([
                'name' => $character->name,
                'str' => $character->str,
                'items' => $simplified_items,
                'carry_capacity' => $carry_capacity,
                'current_carry' => $held_items_weight,
                'encumbered' => $encumbered,
            ]);
        });

        //build json response
        $response_data = collect([
            'character_item_stats' => $character_item_stats,
        ]);

        return view('item.index', $response_data); //TODO: JSONify this bitch
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = $request->input('items');
        if (!$items) {
            $items = [$request->all()];
        }
        foreach ($items as $item) {
            $character = Character::find($item['character_id']);

            $db_item = new Item;
            $db_item->name = $item['name'];
            $db_item->weight = $item['weight'];
            $db_item->character()->associate($character);
            $db_item->save();
        }

        return redirect('/item/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}

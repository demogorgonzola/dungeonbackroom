<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Character;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items_by_character = Item::all()->groupBy('character.id');
        $character_item_stats = $items_by_character->map(
            function($items) {
                $character = $items->first()->character;
                $items_data = $items->map(function($item) {
                    return $item->only('name','weight');
                });
                $carry_capacity = ($character->str * 15.0);
                $current_carry = $items->sum('weight');
                $encumbered = ($current_carry > $carry_capacity);

                return collect([
                    'name' => $character->name,
                    'str' => $character->str,
                    'items' => $items_data,
                    'carry_capacity' => $carry_capacity,
                    'current_carry' => $current_carry,
                    'encumbered' => $encumbered,
                ]);
            }
        );

        $response_data = collect([
            'character_item_stats' => $character_item_stats,
        ]);

        return view('item.index', $response_data);
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
        foreach($items as $item)
        {
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

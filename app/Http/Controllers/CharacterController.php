<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view_data = [
            'characters' => Character::all(),
        ];
        return view('character.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('character.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'unique:characters,name'],
            'str' => ['required'],
        ]);

        $character = new Character();
        $character->name = request('name');
        $character->str = request('str');
        $character->save();

        return redirect("/character/{$character->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        $view_data = [
            'name' => $character->name,
            'str' => $character->str,
        ];

        return view('character.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        $view_data = [
            'id' => $character->id,
            'name' => $character->name,
            'str' => $character->str,
        ];

        return view('character.show', $view_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        request()->validate([
            'name' => ['required', 'unique:characters,name'],
        ]);

        $character->name = request('name');
        $character->str = request('str');
        $character->save();

        return redirect("/character/{$character->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        //
    }
}

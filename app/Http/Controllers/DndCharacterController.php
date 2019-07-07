<?php

namespace App\Http\Controllers;

use App\DndCharacter;
use Illuminate\Http\Request;

class DndCharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('character/index');
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
        $character = new DndCharacter();
        $character->name = $request->input('name');
        $character->class = $request->input('class');
        $character->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DndCharacter  $dndCharacter
     * @return \Illuminate\Http\Response
     */
    public function show(DndCharacter $character)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DndCharacter  $dndCharacter
     * @return \Illuminate\Http\Response
     */
    public function edit(DndCharacter $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DndCharacter  $dndCharacter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DndCharacter $character)
    {
        $character->xp += $request->input('xp-gain');
        $character->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DndCharacter  $dndCharacter
     * @return \Illuminate\Http\Response
     */
    public function destroy(DndCharacter $character)
    {
        //
    }
}

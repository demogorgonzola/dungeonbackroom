<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view_data = [
            'users' => User::all(),
        ];

        return view('user.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => ['required', 'unique:users,name'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();

        return redirect("/user/{$user->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $view_data = [
            'name' => $user->name,
        ];

        return view('user.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $view_data = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];

        return view('user.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => ['required', "unique:users,name,{$user->id}"],
            'email' => ['required', 'email', "unique:users,email,{$user->id}"],
            'password' => ['confirmed']
        ]);

        $user->name = request('name');
        $user->email = request('email');
        if($request->filled('password')) {
            $user->password = request('password');
        }
        $user->save();

        return redirect("/user/{$user->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

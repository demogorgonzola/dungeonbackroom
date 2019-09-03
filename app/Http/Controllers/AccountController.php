<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $view_data = Auth::user()->toArray();

        return view('account.index', $view_data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function edit()
    {
        $view_data = Auth::user()->toArray();

        return view('account.edit', $view_data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/account');
    }
}

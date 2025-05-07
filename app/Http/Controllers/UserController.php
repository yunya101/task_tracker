<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {

        if (!Auth::check()) {
            return redirect()->route('login.login');
        }

        return view('users.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate(
            [
                'name' => ['string', 'required', 'min:3', 'max:50'],
                'email' => ['string', 'required', 'email'],
                'password' => ['string', 'required'],
            ]
        );

        $user = new User(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]
        );

        $user->save();

        return redirect()->route('login.login');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.show', ['user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::findOrFail($id);

        return view('users.edit', ['user' => $user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);

        $validated = $request->validate(
            [
                'name' => ['string', 'required', 'min:3', 'max:50'],
                'email' => ['string', 'required', 'email'],
                'password' => ['string', 'required', 'min:7', 'max:50'],
            ]
        );

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);

        $user->update();

        return redirect()->route('users.edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        //TODO check auth

        $user = User::findOrFail($id);

        $user->delete();

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //TODO
        $user = User::find(1);
        $groups = $user->group;

        return view('groups.index', ['groups' => $groups]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => ['string', 'required', 'min:1', 'max:50'],
        ]);

        $group = new Group([
            'name' => $validated['name'], 
        ]);

        //TODO
        $group->save();

        $group->user()->attach(1);

        return redirect()->route('groups.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $group = Group::findOrFail($id);

        return view('groups.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $group = Group::findOrFail($id);

        return view('groups.edit', ['group' => $group]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //TODO
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TODO
        $group = Group::findOrFail($id);

        $group->delete();

        return redirect()->route('groups.index');
    }
}

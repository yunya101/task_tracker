<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
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
            'count_members' => 1,
        ]);

        $id = Auth::id();

        $group->save();

        $group->user()->attach($id);

        return redirect()->route('groups.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $group = Group::findOrFail($id);

        $user_id = Auth::id();

        $users = $group->users->toArray();

        foreach ($users as $index => $user) {

            if ($user['id'] == $user_id) {
                return view('groups.show', ['group' => $group]);
            }
        }

        abort(403);
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

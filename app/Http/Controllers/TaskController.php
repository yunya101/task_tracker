<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($group_id)
    {

        $tasks = Task::where('group_id', $group_id)->get();

        return view('tasks.index', ['tasks' => $tasks]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($group_id)
    {

        $group = Group::findOrFail($group_id);

        return view('tasks.create', ['group' => $group]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $group_id)
    {

        //TODO group_id and executor

        $validated = $request->validate(
            [
                'title' => ['string', 'required', 'max:255'],
                'description' => ['string', 'nullable', 'max:500'],
                'deadline' => ['date', 'required'],
                'executor' => ['integer', 'nullable'],
            ]
        );

        $task = new Task($validated);
        $task->group_id = $group_id;

        $task->save();

        return redirect()->route('tasks.index', ['group' => $group_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', [$task]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $task = Task::findOrFail($id);

        $validated = $request->validate(
            [
                'title' => ['string', 'required', 'max:255'],
                'description' => ['string', 'required', 'max:500'],
                'deadline' => ['datetime', 'required'],
                'executor' => ['integer', 'nullable'],
            ]
        );

        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->deadline = $validated['deadline'];
        $task->executor = $validated['executor'];

        $task->update();

        return redirect()->route('tasks.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        //TODO check auth
        
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('tasks.index');

    }
}

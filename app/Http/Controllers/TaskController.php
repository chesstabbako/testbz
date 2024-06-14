<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate(15);

        return response()->json(200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
        $request->validate([
            'name' => ['required'],
        ]);

        $task = Task::create($request->all());

        return response()->json(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
        $information = $request->all();
        $task = task::findOrFail($task->id);
        if ($task) {
            $task->update($information);
            return response()->json(200);
        } else {
            return response()->json(403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function complete(UpdateTaskRequest $request, Task $task)
    {
        //

        $task = task::findOrFail($task->id);
        if ($task) {
            $task->update([
                "complete" => 1
            ]);
            return response()->json(200);
        } else {
            return response()->json(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {

        $task = Task::findOrFail($task->id);

        if ($task) {
            $task->update($task);
            return response()->json(204);
        } else {
            return response()->json(403);
        }
    }
}

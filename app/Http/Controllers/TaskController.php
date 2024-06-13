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

        return response()->json([
            'response' => $tasks,
        ], 200);
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

        return response()->json([
            'response' => $task->name . "successfully created",
        ], 200);
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
            return response()->json([
                'response' => $task->id . " successfully updated",
            ], 200);
        } else {
            return response()->json([
                'response' => $task->id . " could not be updated",
            ], 403);
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
            return response()->json([
                'response' => $task->id . " successfully deleted",
            ], 200);
        } else {
            return response()->json([
                'response' => $task->id . " could not be deleted",
            ], 403);
        }
    }
}

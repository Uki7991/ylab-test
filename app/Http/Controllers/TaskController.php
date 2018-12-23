<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Status;
use App\Task;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task.index', [
            'tasks' => Task::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create', [
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $validated = $request->validated();

        Task::create($validated);

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  \App\Task $task
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Task $task)
    {
        if ($request->ajax()) {
            return response()->json([
                'task' => $task->load('status'),
            ]);
        } else {
            return view('task.show', [
                'task' => $task,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', [
            'task' => $task,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskRequest $request
     * @param  \App\Task $task
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $validated = $request->validated();

        $status = $request->change_status ? $request->change_status : null;

        $task->update($validated);

        if ($status) {
            return redirect()->back();
        } else {
            return redirect()->route('task.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task $task
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('task.index');
    }

    public function getTasks()
    {
        $tasks = Task::with('status')->select(['id', 'name', 'status_id', 'created_at', 'updated_at', 'end_date']);

        return Datatables::of($tasks)
            ->addColumn('action', function ($task) {
                return '<a href="'.route('task.edit', $task->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        <a href="'.route('task.destroy', $task->id).'" data-id="'.$task->id.'" data-url="'. route('task.destroy', $task->id) .'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-modal" class="btn btn-sm btn-danger"><i class="fas fa-delete"></i> Delete</a>';
            })
            ->make(true);
    }
}

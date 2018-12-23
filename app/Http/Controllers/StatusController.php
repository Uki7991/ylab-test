<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Status;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('status.index', [
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StatusRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        $validated = $request->validated();

        Status::create($validated);

        return redirect()->route('status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('status.edit', [
            'status' => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $status->update($request->request->all());

        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status $status
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->tasks()->delete();

        $status->delete();

        return redirect()->route('status.index');
    }

    public function getStatuses()
    {
        $statuses = Status::select(['id', 'name', 'sort', 'created_at', 'color']);

        return Datatables::of($statuses)
            ->addColumn('action', function ($status) {
                return '<a href="'.route('status.edit', $status->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        <a href="'.route('status.destroy', $status->id).'" data-id="'.$status->id.'" data-url="'. route('status.destroy', $status->id) .'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-modal" class="btn btn-sm btn-danger"><i class="fas fa-delete"></i> Delete</a>';
            })
            ->make(true);
    }
}

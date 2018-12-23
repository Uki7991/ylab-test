<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,name,'.$user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);

        if ($request->admin === 'on') {
            $request->request->set('admin', true);
        } else {
            $request->request->set('admin', false);
        }

        $user->update($request->request->all());

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }

    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public function getUsers()
    {
        $users = User::select(['id', 'name', 'email', 'created_at']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="'.route('user.edit', $user->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        <a href="'.route('user.destroy', $user->id).'" data-id="'.$user->id.'" data-url="'. route('user.destroy', $user->id) .'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-modal" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>';
            })
            ->removeColumn('password')
            ->make(true);
    }
}

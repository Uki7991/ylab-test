<?php

namespace App\Http\Controllers;

use App\Status;
use App\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');

        return view('admin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(Request $request)
    {
        $tasks = Task::all();
        if ($request->query('sort') === null) {
            $request->query->add(['sort' => true]);
        }
        if ($request->query('field') === null) {
            $request->query->add(['field' => 'id']);
        }

        if ($request->query('sort')) {
            $tasks = $tasks->sortByDesc($request->query('field'));
        } else {
            $tasks = $tasks->sortBy($request->query('field'));
        }

        return view('welcome', [
            'tasks' => $tasks,
            'statuses' => Status::all(),
            'sort' => $request->query('sort'),
            'field' => $request->query('field'),
        ]);
    }

    public function about()
    {
        return view('about');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AbroadingPlan;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::latest()->get();

        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AbroadingPlan $abroading_plan)
    {
        $user = Auth::user();
        $abroading_plans = AbroadingPlan::where('user_id', '=', Auth::id())->get();

        return view('todos.create', compact('user', 'abroading_plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AbroadingPlan $abroading_plan)
    {
        $request->validate([
            'priority_num' => 'required',
            'duedate' => 'required',
            'content' => 'required',
        ]);

        $todo = new Todo();
        $todo->user_id = Auth::id();
        $todo->priority_num = $request->input('priority_num');
        $todo->duedate = $request->input('duedate');
        $todo->content = $request->input('content');
        $todo->abroading_plan_id = $request->input('abroading_plan_id');
        $todo->done = false;
        $todo->is_public = $request->boolean('is_public');
        $todo->save();



        return redirect()->route('todos.index')->with('flash_massege','Todoリストの作成が完了しました!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $todo->content = $request->input('content');
        $todo->user_id = Auth::id();
        $todo->done = $request->boolean('done', $todo->done);
        $todo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index');
    }
}

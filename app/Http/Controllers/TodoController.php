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
    public function index(Request $request)
    {
        // まずは受け取ったパラメータの値を変数に格納する
        $priority = $request->input('priority');
        $due = $request->input('due');
        $status = $request->input('status');

        // クエリを組み立てるためのビルダーの準備
        $query = Todo::query();


        // それぞれパラメータに指定があれば検索条件を付け加えていく
        if ($priority == 1) {
            $query->where('user_id', '=', Auth::id())->orderBy('priority_num', 'DESC');
        }

        if ($due == 1) {
            $query->where('user_id', '=', Auth::id())->orderBy('duedate', 'ASC');
        }

        if ($status == "todo") {
            $query->where('user_id', '=', Auth::id())->where('done', '=', '0');
        } elseif ($status == "done") {
            $query->where('user_id', '=', Auth::id())->where('done', '=', '1');
        }

        // get()を実行することで実際にDBへの問い合わせが実行される
        $todos = $query->where('user_id', '=', Auth::id())->get();


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
    public function store(Request $request, Todo $todo)
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



        return to_route('todos.index');
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
        if ($request->done == 1) {
            $todo->done = $request->input('done');
            $todo->save();
        }

        $request->validate([
            'priority_num' => 'required',
            'duedate' => 'required',
            'content' => 'required',
        ]);

        $todo->user_id = Auth::id();
        $todo->priority_num = $request->input('priority_num');
        $todo->content = $request->input('content');
        $todo->done = $request->boolean('done', $todo->done);
        $todo->duedate = $request->input('duedate');
        $todo->is_public = $request->boolean('is_public');
        $todo->save();

        return to_route('todos.index', 'todo');
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

        return to_route('todos.index');
    }
}

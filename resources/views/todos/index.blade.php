@extends('layouts.app')

@section('content')
    <div class="all">
        <h1 style="margin-top: 32px">Todo一覧</h1>
        <div>
            <a class="back" href="{{ route('home') }}">&lt;戻る</a>
        </div>
        <div style="display: flex; justify-content: space-between">
            <div style="margin-top: 32px">
                <a class="link link-menu" href="{{ route('todos.create') }}">+新規作成</a>
            </div>
            <div style="margin-top: 32px">
                <a class="link link-menu"
                    href="{{ route('todos.index', array_merge(request()->query(), ['priority' => 1])) }}">優先度</a>
                <a class="link link-menu"
                    href="{{ route('todos.index', array_merge(request()->query(), ['due' => 1])) }}">期限順</a>
                <a class="link link-menu"
                    href="{{ route('todos.index', array_merge(request()->query(), ['status' => 'todo'])) }}">未完了</a>
                <a class="link link-menu"
                    href="{{ route('todos.index', array_merge(request()->query(), ['status' => 'done'])) }}">完了</a>
            </div>
        </div>
        <div>
            @if (count($todos))
                @foreach ($todos as $todo)
                    @if ($todo->done != 1)
                        @if ($todo->isDuedate())
                            <div class="card" style="padding: 16px; background-color:rgba(255, 145, 0, 0.661)">
                                <div class="card-body">
                                    <div class="dueMessage">
                                        <span class="dueAlert">期限は今日です</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between">
                                        <h5 style="font-size: 24px; margin-top:16px">留学先:{{ $todo->abroadingPlan->city->name }}</h5>
                                        <div style="display: flex; justify-content: space-between">
                                            <div style="margin-top: 8px; margin-right: 8px">
                                                <a class="card-link link link-menu" style="border: none"
                                                    href="{{ route('todos.edit', $todo) }}"><i
                                                        class="far fa-edit fa-lg"></i></a>
                                            </div>
                                            <div style="margin-right: 8px">
                                                <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{ $todo->id }}">
                                                    <button type="submit" class="btn"><i
                                                            class="fas fa-trash-alt fa-lg"></i></button>
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('todos.update', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="done" value="1">
                                                    <button type="submit" class="btn"><i class="fas fa-check fa-lg"
                                                            style="color: red"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin: 32px">
                                        <p style="font-size: 16px">優先度:{{ $todo->priority_num }}</p>
                                        <p style="font-size: 16px">期限:{{ $todo->duedate }}</p>
                                    </div>
                                    <div class="todo-content">
                                        <h4>{{ $todo->content }}</h4>
                                    </div>
                                </div>
                            </div>
                        @elseif ($todo->isOverDuedate())
                            <div class="card" style="padding: 16px; background-color:rgba(243, 18, 6, 0.748)">
                                <div class="card-body">
                                    <div class="dueMessage">
                                        <span class="dueAlert">期限を過ぎています</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between">
                                        <h5 style="font-size: 24px;margin-top:16px">留学先:{{ $todo->abroadingPlan->city->name }}</h5>
                                        <div style="display: flex; justify-content: space-between">
                                            <div style="margin-top: 8px; margin-right: 8px">
                                                <a class="card-link link link-menu" style="border: none"
                                                    href="{{ route('todos.edit', $todo) }}"><i
                                                        class="far fa-edit fa-lg"></i></a>
                                            </div>
                                            <div style="margin-right: 8px">
                                                <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{ $todo->id }}">
                                                    <button type="submit" class="btn"><i
                                                            class="fas fa-trash-alt fa-lg"></i></button>
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('todos.update', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="done" value="1">
                                                    <button type="submit" class="btn"><i class="fas fa-check fa-lg"
                                                            style="color: red"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin: 32px">
                                        <p style="font-size: 16px">優先度:{{ $todo->priority_num }}</p>
                                        <p style="font-size: 16px">期限:{{ $todo->duedate }}</p>
                                    </div>
                                    <div class="todo-content">
                                        <h4>{{ $todo->content }}</h4>
                                    </div>
                                </div>
                            </div>
                        @elseif ($todo->isSoonDuedate())
                            <div class="card" style="padding: 16px; background-color:rgba(255, 255, 0, 0.319)">
                                <div class="card-body">
                                    <div class="dueMessage">
                                        <span class="dueAlert">期限１週間を切っています</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between">
                                        <h5 style="font-size: 24px; margin-top:16px">留学先:{{ $todo->abroadingPlan->city->name }}</h5>
                                        <div style="display: flex; justify-content: space-between">
                                            <div style="margin-top: 8px; margin-right: 8px">
                                                <a class="card-link link link-menu" style="border: none"
                                                    href="{{ route('todos.edit', $todo) }}"><i
                                                        class="far fa-edit fa-lg"></i></a>
                                            </div>
                                            <div style="margin-right: 8px">
                                                <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{ $todo->id }}">
                                                    <button type="submit" class="btn"><i
                                                            class="fas fa-trash-alt fa-lg"></i></button>
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('todos.update', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="done" value="1">
                                                    <button type="submit" class="btn"><i class="fas fa-check fa-lg"
                                                            style="color: red"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin: 32px">
                                        <p style="font-size: 16px">優先度:{{ $todo->priority_num }}</p>
                                        <p style="font-size: 16px">期限:{{ $todo->duedate }}</p>
                                    </div>
                                    <div class="todo-content">
                                        <h4>{{ $todo->content }}</h4>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card" style="padding: 16px">
                                <div class="card-body">
                                    <div style="display: flex; justify-content: space-between">
                                        <h5 style="font-size: 24px">留学先:{{ $todo->abroadingPlan->city->name }}</h5>
                                        <div style="display: flex; justify-content: space-between">
                                            <div style="margin-top: 8px; margin-right: 8px">
                                                <a class="card-link link link-menu" style="border: none"
                                                    href="{{ route('todos.edit', $todo) }}"><i
                                                        class="far fa-edit fa-lg"></i></a>
                                            </div>
                                            <div style="margin-right: 8px">
                                                <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{ $todo->id }}">
                                                    <button type="submit" class="btn"><i
                                                            class="fas fa-trash-alt fa-lg"></i></button>
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('todos.update', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="done" value="1">
                                                    <button type="submit" class="btn"><i class="fas fa-check fa-lg"
                                                            style="color: red"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin: 32px">
                                        <p style="font-size: 16px">優先度:{{ $todo->priority_num }}</p>
                                        <p style="font-size: 16px">期限:{{ $todo->duedate }}</p>
                                    </div>
                                    <div class="todo-content">
                                        <h4>{{ $todo->content }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="card" style="padding: 16px">
                            <div class="card-body">
                                <div style="display: flex; justify-content: space-between">
                                    <h5 style="font-size: 24px">留学先:{{ $todo->abroadingPlan->city->name }}</h5>
                                    <div style="display: flex; justify-content:space-between">
                                        <div style="margin-top: 8px; margin-right: 8px">
                                            <a class="card-link link link-menu" style="border: none"
                                                href="{{ route('todos.edit', $todo) }}"><i
                                                    class="far fa-edit fa-lg"></i></a>
                                        </div>
                                        <div>
                                            <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{ $todo->id }}">
                                                <button type="submit" class="btn"><i
                                                        class="fas fa-trash-alt fa-lg"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin: 32px">
                                    <p style="font-size: 16px">優先度:{{ $todo->priority_num }}</p>
                                    <p style="font-size: 16px">期限:{{ $todo->duedate }}</p>
                                </div>
                                <div style="display: flex; justify-content: space-between">
                                    <div class="todo-content">
                                        <h4>{{ $todo->content }}</h4>
                                    </div>
                                    <div style="color:red; font-size: 36px; text-align: right">完了!</div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <h3>Todoを作成してみよう!</h3>
            @endif
        </div>
    </div>
@endsection

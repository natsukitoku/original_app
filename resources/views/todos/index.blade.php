@extends('layouts.app')

@section('content')
    <h1 style="margin-top: 32px">Todo一覧</h1>
    <div>
        <a class="back" href="{{ route('home') }}">&lt;戻る</a>
    </div>
    <div style="display: flex; justify-content: space-between">
        <div style="margin-top: 16px">
            <a class="link link-menu" href="{{ route('todos.create') }}">+新規作成</a>
        </div>
        <div style="margin: 16px">
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
                    <div class="card">
                        <div class="card-body" style="margin: 32px">
                            <h5 class="card-title">留学先:{{ $todo->abroading_plan->city->name }}</h5>
                            <a class="card-link link link-menu" href="{{ route('todos.edit', $todo) }}">編集</a>

                            <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" value="{{ $todo->id }}">
                                <button type="submit">削除</button>
                            </form>
                            <form action="{{ route('todos.update', $todo) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="done" value="1">
                                <button type="submit">完了</button>
                            </form>
                        </div>
                        <div style="margin: 32px">
                            <p style="margin-right: 16px">優先度:{{ $todo->priority_num }}</p>
                            <p>期限:{{ $todo->duedate }}</p>
                        </div>
                        <div class="todo-content">
                            <p>{{ $todo->content }}</p>
                        </div>
                    </div>
    </div>
@else
    <div class="card">
        <div class="card-body" style="margin: 32px">
            <h5 class="card-title">留学先:{{ $todo->abroading_plan->city->name }}</h5>
            <span style="color:red">完了!</span>
            <a class="card-link link link-menu" href="{{ route('todos.edit', $todo) }}">編集</a>
            <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" value="{{ $todo->id }}">
                <button type="submit">削除</button>
            </form>
            <div style="margin: 32px">
                <p style="margin-right: 8px">優先度:{{ $todo->priority_num }}</p>
                <p>期限:{{ $todo->duedate }}</p>
            </div>
            <div class="todo-content">
                <p>{{ $todo->content }}</p>
            </div>
        </div>
    </div>
    @endif
    @endforeach
@else
    <h3>Todoを作成してみよう!</h3>
    @endif
    </div>
@endsection

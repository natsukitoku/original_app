@extends('layouts.app')

@section('content')
    <div style="margin-top: 24px">
        <h1>ToDo一覧</h1>
    </div>
    <div>
        <a href="{{ route('home') }}">&lt;戻る</a>
    </div>
    <div>
        <a href="{{ route('todos.create') }}">+新規作成</a>
    </div>
    <form action="{{route('todos.index')}}">
        <button type="submit" name="sort" value="1">優先度順</button>
        <button type="submit" name="sort" value="2">期限順</button>
    </form>
    <div>
        @foreach ($todos as $todo)
            @if ($todo->done != true)
                <div style="border: solid 1px; margin: 32px">
                    <h5>留学先:{{ $todo->abroading_plan->city->name }}</h5>
                    <a href="{{ route('todos.edit', $todo) }}">編集</a>
                    <form action="{{ route('todos.destroy', $todo) }}" method="DELETE">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{ $todo->id }}">
                        <button type="submit">削除</button>
                    </form>
                    <form action="{{ route('todos.update', $todo) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="done" value="true">
                        <button type="submit">完了</button>
                    </form>
                    <div style="margin-top: 32px; display: flex">
                        <p style="margin-right: 8px">優先度:{{ $todo->priority_num }}</p>
                        <p>期限:{{ $todo->duedate }}</p>
                    </div>
                    <div style="margin: 32px">
                        <p>{{ $todo->content }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection

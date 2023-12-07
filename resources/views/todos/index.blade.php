@extends('layouts.app')

@section('content')
<div style="margin-top: 24px">
    <h1>ToDo一覧</h1>
</div>
<div>
    <a href="{{route('home')}}">戻る</a>
</div>
<div>
    <a href="{{route('todos.create')}}">+新規作成</a>
</div>
<div>
    {{-- @if () --}}

    {{-- @endif --}}
    @foreach ($todos as $todo)
    <div style="border: solid 1px; margin: 32px">
        <h5>留学先:{{$todo->abroading_plan->city->name}}</h5>
        <a href="{{route('todos.edit', $todo)}}">編集</a>
        {{-- <form action="{{route('todos.destroy', $todo)}}" method="DELETE">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{$todo->id}}">
            <button type="submit">削除</button>
        </form> --}}
        <div style="margin-top: 32px; display: flex">
            <p style="margin-right: 8px">優先度:{{$todo->priority_num}}</p>
            <p>期限:{{$todo->duedate}}</p>
        </div>
        <div style="margin: 32px">
            <h4>{{$todo->content}}</h4>
        </div>
    </div>
    @endforeach
</div>
@endsection

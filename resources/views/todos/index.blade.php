@extends('layouts.app')

@section('content')
<div style="margin-top: 80px">
    <h1>ToDo一覧</h1>
</div>
<div>
    <a href="{{route('todos.create')}}">+新規作成</a>
</div>
<div>
    {{-- @if () --}}

    {{-- @endif --}}
    {{-- @foreach ($todos as $todo) --}}
    <div style="border: solid 1px; margin: 32px">
        <div style="margin-top: 32px; display: flex">
            <p style="margin-right: 8px">優先度:</p>
            <p>期限:</p>
        </div>
        <div style="margin: 32px">
            <h4>内容</h4>
        </div>
    </div>
    {{-- @endforeach --}}
</div>

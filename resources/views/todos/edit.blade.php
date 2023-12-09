@extends('layouts.app')

@section('content')
    <h1>Todoリストの編集</h1>
    <div>
        <a href="{{ route('todos.index') }}">&lt;戻る</a>
    </div>
    <form action="{{ route('todos.update', $todo) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-top: 32px">
            <label for="priority_num">優先度選択</label>
            <select name="priority_num" id="priority_num">
                @if ($todo->priority_num)
                    <option value="{{ $todo->priority_num }} selected">{{ $todo->priority_num }}</option>
                @endif
                <option hidden>選択して下さい</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <div>
            <label for="date">期限</label>
            <input type="date" id="date" name="duedate" value="{{ $todo->duedate }}">
        </div>
        <div style="margin: 32px">
            <textarea name="content" id="content" cols="30" rows="10" placeholder="タスク内容">{{ $todo->content }}</textarea>
        </div>
        <div style="display: flex">
            @if ($todo->is_public == 0)
                <label for="public"><input type="radio" name="is_public" value="0" checked>公開</label>
                <label for="private"><input type="radio" name="is_public" value="1">非公開</label>
            @else
                <label for="public"><input type="radio" name="is_public" value="0">公開</label>
                <label for="private"><input type="radio" name="is_public" value="1" checked>非公開</label>
            @endif
        </div>
        <button type="submit">登録</button>
    </form>
@endsection

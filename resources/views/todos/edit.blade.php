@extends('layouts.app')

@section('content')
    <h1 style="margin-top: 32px">Todoリストの編集</h1>
    <div>
        <a class="back" href="{{ route('todos.index') }}">&lt;戻る</a>
    </div>
    <form action="{{ route('todos.update', $todo) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-top: 32px">
            <label for="priority_num">優先度選択</label>
            <select name="priority_num" id="priority_num">

                <option hidden>選択して下さい</option>
                @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $number)
                    <option value="{{ $number }}" @if ($number == $todo->priority_num) selected @endif>
                        {{ $number }}</option>
                @endforeach
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

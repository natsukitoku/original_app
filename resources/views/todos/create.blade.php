@extends('layouts.app')

@section('content')
<div style="margin-top: 80px; margin-bottom: 24px">
    <h1>Todoリストの作成</h1>
</div>
<div>
    <a href="{{route('todos.index')}}">戻る</a>
</div>
<div>
    <form method="POST" action="{{route('todos.store')}}">
        @csrf
        <div style="margin-top: 32px">
            @error('priority_num')
            <strong>優先度を選択してください</strong>
            @enderror
            <label for="priority_num">優先度選択</label>
            <select name="priority_num" id="priority_num">
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
            @error('duedate')
            <strong>期限を選択してください。</strong>
            @enderror
            <label for="duedate">期限</label>
            <input type="date" id="duedate" name="duedate" value="">
        </div>
        <div style="margin: 32px">
            @error('content')
            <strong>タスクを入力してください。</strong>
            @enderror
            <textarea name="content" id="content" cols="30" rows="10" placeholder="タスク内容"></textarea>
        </div>
        <div style="display: flex">
            <div style="margin-left: 16px">
                <input type="checkbox" name="public" id="public" checked>
                <label for="public">公開</label>
            </div>
            <div style="margin-left: 32px">
                <input type="checkbox" name="private" id="private">
                <label for="private">非公開</label>
            </div>
        </div>
        <button type="submit">登録</button>
    </form>
</div>

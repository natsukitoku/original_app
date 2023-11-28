@extends('layouts.app')

@section('content')
<div style="margin: 80px">
    <h1>パスワードの変更</h1>
    <a href="{{route('mypage.edit')}}">戻る</a>
</div>

<div>
    <div>
        <p>現在のパスワード</p>
        <input type="text">
    </div>

    <div>
        <p>新しいパスワード</p>
        <input type="text">
    </div>

    <button type="submit">変更</button>
</div>

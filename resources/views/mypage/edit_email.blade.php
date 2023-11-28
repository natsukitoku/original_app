@extends('layouts.app')

@section('content')
<div style="margin: 80px">
    <h1>メールアドレスの変更</h1>
    <a href="{{route('mypage.edit')}}">戻る</a>
</div>

<div>
    <div>
        <p>現在のメールアドレス</p>
        <input type="text">
    </div>

    <div>
        <p>新しいメールアドレス</p>
        <input type="text">
    </div>

    <button type="submit">変更</button>
</div>



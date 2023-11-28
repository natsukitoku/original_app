@extends('layouts.app')

@section('content')

<div style="margin-top: 80px">
    <h1>つぶやきページ</h1>
</div>
<div>
    <a href="{{route('follows.search_friends')}}">新しい友達を探す</a>
</div>
<div style="margin: 24px">
    <div style="border: solid 1px">
        <p>アカウント名</p>
        <p>内容</p>
    </div>
    <a href="#">コメントする</a>
</div>

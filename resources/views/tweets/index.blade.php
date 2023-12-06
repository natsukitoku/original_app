@extends('layouts.app')

@section('content')

<div style="margin-top: 80px">
    <h1>つぶやきページ</h1>
</div>
<div>
    <a href="{{route('tweets.create')}}">つぶやく</a>
    <a href="{{route('follows.search_friends')}}">新しい友達を探す</a>
</div>
<div style="margin: 24px">
    @foreach ($tweets as $tweet)
    <div style="border: solid 1px; margin: 16px">
        <p>{{$tweet->user->name}}</p>
        <a href="{{route('tweets.edit', 'tweet')}}">編集</a>
        <a href="{{route('tweets.destroy', 'tweet')}}">削除</a>
        <p>{{$tweet->content}}</p>
    </div>
    <a href="#">コメントする</a>
    @endforeach
</div>

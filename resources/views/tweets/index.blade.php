@extends('layouts.app')

@section('content')

    <div style="margin-top: 80px">
        <h1>つぶやきページ</h1>
    </div>
    <div>
        <a href="{{ route('home') }}">&lt;戻る</a>
    </div>
    <div>
        <a href="{{ route('tweets.create') }}">つぶやく</a>
        <a href="{{ route('follows.search_friends') }}">新しい友達を探す</a>
    </div>
    <div style="margin: 24px">
        @foreach ($tweets as $tweet)
            <div style="border: solid 1px; margin: 16px">
                <h4>{{ $tweet->user->name }}</h4>
                <a href="{{ route('tweets.edit', $tweet) }}">編集</a>
                <form action="{{ route('tweets.destroy', $tweet) }}" method="DELETE">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{ $tweet->id }}">
                    <button type="button">削除</button>
                </form>
                <p>{{ $tweet->content }}</p>
            </div>
            @foreach ($tweet->comments as $comment)
                <div style="border: 1px solid">
                    <h6>{{ $comment->user->name }}</h6>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach

            <a href="{{ route('comments.create', $tweet) }}">コメントする</a>
        @endforeach
    </div>

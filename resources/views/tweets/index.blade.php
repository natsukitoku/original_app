@extends('layouts.app')

@section('content')


    <h1>つぶやきページ</h1>
    <div>
        <a href="{{ route('home') }}">&lt;戻る</a>
    </div>
    <div>
        <a href="{{ route('tweets.create') }}">つぶやく</a>
        <a href="{{ route('follows.search_friends') }}">新しい友達を探す</a>
    </div>
    <div style="margin: 24px">
        @foreach ($tweets as $tweet)
        @php
            $user = $tweet->user_id;
        @endphp
            <div style="border: solid 1px; margin: 16px">
                <a href="{{route('follows.show',$user)}}"><h4>{{ $tweet->user->name }}</h4></a>
                <a href="{{ route('tweets.edit', $tweet) }}">編集</a>
                <form action="{{ route('tweets.destroy', $tweet) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{ $tweet->id }}">
                    <button type="submit">削除</button>
                </form>
                <p>{{ $tweet->content }}</p>
            </div>
            @foreach ($tweet->comments as $comment)
                <div style="border: 1px solid">
                    <h6>{{ $comment->user->name }}</h6>
                    <p>{{ $comment->content }}</p>
                </div>
                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{ $comment->id }}">
                    <button type="submit">削除</button>
                </form>
            @endforeach

            <a href="{{ route('comments.create', $tweet) }}">コメントする</a>
        @endforeach
    </div>
@endsection

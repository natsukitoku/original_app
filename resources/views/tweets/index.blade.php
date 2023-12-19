@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">つぶやきページ</h1>
    <div style="display: flex; justify-content: space-between">
        <div>
            <a class="back" href="{{ route('home') }}">&lt;戻る</a>
        </div>
        <div>
            <a class="link link-menu" href="{{ route('tweets.create') }}" style="margin-right: 24px">つぶやく</a>
            <a class="link link-menu" href="{{ route('follows.search_friends') }}">新しい友達を探す</a>
        </div>
    </div>
    <div style="margin: 24px">
        @foreach ($tweets as $tweet)
            @php
                $user = $tweet->user_id;
            @endphp
            <div class="card tweets">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between">
                        <a class="link" href="{{ route('follows.show', $user) }}">
                            <h4 class="card-title">{{ $tweet->user->name }}</h4>
                        </a>
                        <div style="display: flex; justify-content: space-between">
                            <div style="margin-top: 8px; margin-right: 8px">
                                <a class="link
                                link-menu" href="{{ route('tweets.edit', $tweet) }}">編集</a>
                            </div>
                            <div>
                                <form action="{{ route('tweets.destroy', $tweet) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $tweet->id }}">
                                    <button type="submit" class="btn btn-outline-danger">削除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <p style="font-size: 16px; margin-top: 16px">{{ $tweet->content }}</p>
                    <div style="float: right">
                        <a class="link link-menu comment-link" href="{{ route('comments.create', $tweet) }}">コメントする</a>
                    </div>
                </div>
            </div>
            @foreach ($tweet->comments as $comment)
                <div class="card comments card text-bg-light mb-3">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between">
                            <h6 class="card-title">{{ $comment->user->name }}</h6>
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" value="{{ $comment->id }}">
                                <button type="submit" class="btn btn-outline-danger">削除</button>
                            </form>
                        </div>
                        <p style="font-size: 16px">{{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection

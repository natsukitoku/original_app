@extends('layouts.app')

@section('content')
    <h1>コメントの作成</h1>
    <div>
        <a href="{{ route('tweets.index') }}">&lt;戻る</a>
    </div>
    <form action="{{ route('comments.store', $tweet) }}" method="POST">
        @csrf
        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <textarea name="content" id="comment" cols="30" rows="10"></textarea>
        <button type="submit">送信</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">コメントの作成</h1>

    <div style="margin-bottom: 24px; margin-top:24px">
        <a class="back" href="{{ route('tweets.index') }}">&lt;戻る</a>
    </div>
    <div style="margin-left: 88px">
        <form action="{{ route('comments.store', $tweet) }}" method="POST">
            @csrf
            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <textarea name="content" id="comment" cols="30" rows="10" placeholder="コメントを入力してください！"></textarea>
            <div style="margin-left: 192px">
                <button type="submit" class="btn btn-outline-success">送信</button>
            </div>
        </form>
    </div>
</div>
@endsection

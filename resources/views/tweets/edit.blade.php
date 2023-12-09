@extends('layouts.app')

@section('content')
    <h1>つぶやき編集</h1>

    <div>
        <a href="{{ route('tweets.index') }}">&lt;戻る</a>
    </div>
    <form action="{{ route('tweets.update', $tweet) }}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="content" id="content" cols="30" rows="10" placeholder="今の気持ちをつぶやこう!">{{ $tweet->content }}</textarea>
        <button type="submit">つぶやく</button>
    </form>
@endsection

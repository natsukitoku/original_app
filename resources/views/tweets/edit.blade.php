@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">つぶやき編集</h1>

    <div>
        <a class="back" href="{{ route('tweets.index') }}">&lt;戻る</a>
    </div>
    <form action="{{ route('tweets.update', $tweet) }}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="content" id="content" cols="30" rows="10" placeholder="今の気持ちをつぶやこう!">{{ $tweet->content }}</textarea>
        <button type="submit">つぶやく</button>
    </form>
</div>
@endsection

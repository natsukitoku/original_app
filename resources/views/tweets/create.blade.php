@extends('layouts.app')

@section('content')
    <h1>つぶやき作成</h1>
    <div>
        <a href="{{route('tweets.index')}}">&lt;戻る</a>
    </div>
    <form action="{{ route('tweets.store') }}" method="POST">
        @csrf
        <textarea name="content" id="content" cols="30" rows="10" placeholder="今の気持ちをつぶやこう!"></textarea>
        <button type="submit">つぶやく</button>
    </form>
@endsection

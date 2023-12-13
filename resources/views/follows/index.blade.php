@extends('layouts.app')

@section('content')
    <h1>友達一覧</h1>
    <div>
        <a href="{{ route('home') }}">&lt;戻る</a>
    </div>
    <div>
        <a href="{{ route('follows.search_friends') }}">新しい友達を探す</a>
    </div>
    <div>
        <ul>
            @foreach ($followees as $followee)
                <li>{{ $followee->name }}</li>
                <button>unfollow</button>
            @endforeach
        </ul>
    </div>
@endsection

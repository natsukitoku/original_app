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
            @php
                $user = $followee;
            @endphp
                <li>
                    <a href="{{route('follows.show', $user)}}">{{ $user->name }}</a>
                </li>
                {{-- <form action="{{ route('follows.unfollow')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="followee_id" value="{{ $user->id }}">
                    <button type="submit">unfollow</button>
                </form> --}}
            @endforeach
        </ul>
    </div>
@endsection

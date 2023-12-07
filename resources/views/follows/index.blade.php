@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 24px">
    <h1>友達一覧</h1>
</div>
<div>
    <a href="{{route('home')}}">戻る</a>
</div>
<div>
    <a href="{{route('follows.search_friends')}}">新しい友達を探す</a>
</div>
<div>
    <ul>
        @foreach ($followees as $followee)
        <li>{{$followee->followee_id}}</li>
        <button>unfollow</button>
        @endforeach
    </ul>
</div>
@endsection


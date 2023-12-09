@extends('layouts.app')

@section('content')

 <h1>マイページ</h1>
<div>
    <a href="{{route('mypage')}}">戻る</a>
</div>

<div>
    <ul>
        <li><a href="{{route('mypage.edit')}}">アカウント情報登録</a></li>
        <li><a href="{{route('mypage.favorites')}}">気になる国一覧</a></li>
        <li><a href="{{route('mypage.index.plans')}}">留学予定</a></li>
        <li><a href="#">ログアウト</a></li>

    </ul>
</div>
@endsection

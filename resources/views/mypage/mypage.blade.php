@extends('layouts.app')

@section('content')
<div class="container">
    <h1>マイページ</h1>
</div>
<div>
    <ul>
        <li><a href="{{route('mypage.edit')}}">アカウント情報登録</a></li>
        <li><a href="{{route('mypage.favorites')}}">気になる国一覧</a></li>
        <li><a href="{{route('mypage.create.plans')}}">留学予定登録・変更</a></li>
        <li><a href="#">ログアウト</a></li>

    </ul>
</div>
@endsection

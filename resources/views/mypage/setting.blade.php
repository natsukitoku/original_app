@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">設定</h1>
    <div style="margin-bottom: 24px; margin-top:24px">
        <a class="back" href="{{ route('mypage') }}">&lt;戻る</a>
    </div>

    <div style="width: 480px; margin-left: 48px">
        <ul style="list-style: none">
            <li><a class="link" href="{{ route('mypage.edit') }}">アカウント情報登録</a>
            </li>
            <hr>
            <li><a class="link" href="{{ route('mypage.favorites') }}">気になる国一覧</a></li>
            <hr>
            <li><a class="link" href="{{ route('mypage.index.plans') }}">留学予定</a></li>
            <hr>
            <li><a class="link" href="#">ログアウト</a></li>

        </ul>
    </div>
</div>
@endsection

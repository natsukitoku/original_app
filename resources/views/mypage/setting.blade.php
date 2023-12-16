@extends('layouts.app')

@section('content')
    <h1 style="margin-top: 32px">設定</h1>
    <div>
        <a class="back" href="{{ route('mypage') }}">&lt;戻る</a>
    </div>

    <div>
        <ul>
            <li><a class="link" href="{{ route('mypage.edit') }}">アカウント情報登録</a></li>
            <li><a class="link" href="{{ route('mypage.favorites') }}">気になる国一覧</a></li>
            <li><a class="link" href="{{ route('mypage.index.plans') }}">留学予定</a></li>
            <li><a class="link" href="#">ログアウト</a></li>

        </ul>
    </div>
@endsection

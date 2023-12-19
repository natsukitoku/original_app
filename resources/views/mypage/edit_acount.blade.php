@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">アカウント情報編集</h1>
    <div style="margin-bottom: 24px; margin-top:24px">
        <a class="back" href="{{ route('mypage.setting') }}">&lt;戻る</a>
    </div>
    <div style="width: 480px; margin-left: 48px">
        <ul style="list-style: none">
            <li>
                <a class="link" href="{{ route('mypage.edit_password') }}">パスワードの変更</a>
            </li>
            <hr>
            <li>
                <a class="link" href="{{ route('mypage.edit_email') }}">メールアドレスの変更</a>
            </li>
        </ul>
    </div>
</div>
@endsection

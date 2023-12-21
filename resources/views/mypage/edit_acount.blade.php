@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">アカウント情報編集</h1>
    <div style="margin-bottom: 24px; margin-top:24px">
        <a class="back" href="{{ route('mypage.setting') }}">&lt;戻る</a>
    </div>
    <div style="width: 480px; margin-left: auto; margin-right: auto">
        <ul style="list-style: none">
            <li>
                <a class="link" href="{{ route('mypage.edit_username')}}">ユーザー名の変更
                    <i class="fas fa-chevron-right fa-2x" style="font-size:24px; float:right"></i>
                </a>
            </li>
            <hr>
            <li>
                <a class="link" href="{{ route('mypage.edit_password') }}">パスワードの変更
                    <i class="fas fa-chevron-right fa-2x" style="font-size:24px; float:right"></i>
                </a>
            </li>
            <hr>
            <li>
                <a class="link" href="{{ route('mypage.edit_email') }}">メールアドレスの変更
                    <i class="fas fa-chevron-right fa-2x" style="font-size:24px; float:right"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection

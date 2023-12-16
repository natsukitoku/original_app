@extends('layouts.app')

@section('content')
    <h1 style="margin-top: 32px">アカウント情報編集</h1>
    <a class="back" href="{{ route('mypage') }}">&lt;戻る</a>
    <div>
        <ul>

            <!-- TODO 基本情報編集ページ -->

            <li>
                <a class="link" href="{{ route('mypage.edit_password') }}">パスワードの変更</a>
            </li>
            <li>
                <a class="link" href="{{ route('mypage.edit_email') }}">メールアドレスの変更</a>
            </li>
        </ul>
    </div>
@endsection

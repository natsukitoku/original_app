@extends('layouts.app')

@section('content')
    <h1>アカウント情報編集</h1>
    <a href="{{ route('mypage') }}">戻る</a>
    <div>
        <ul>

            <!-- TODO 基本情報編集ページ -->

            <li>
                <a href="{{ route('mypage.edit_password') }}">パスワードの変更</a>
            </li>
            <li>
                <a href="{{ route('mypage.edit_email') }}">メールアドレスの変更</a>
            </li>
        </ul>
    </div>
@endsection

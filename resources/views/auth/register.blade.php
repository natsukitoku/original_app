@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="mt-4 mb-3">新規会員登録</h3>

                <hr>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-5 col-form-label text-md-left">ユーザー名<span
                                class="ml-1 abroading-app-require-input-label"><span
                                    class="abroading-app-require-input-label-text"
                                    style="color: red; margin-left:8px">必須</span></span></label>

                        <div class="col-md-7">
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror abroading-app-login-input"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="山田 花子">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>氏名を入力してください</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-5 col-form-label text-md-left">メールアドレス<span
                                class="ml-1 abroading-app-require-input-label"><span
                                    class="abroading-app-require-input-label-text"
                                    style="color: red; margin-left:8px">必須</span></span></label>

                        <div class="col-md-7">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror abroading-app-login-input"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="abcd@abcd.com">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>メールアドレスを入力してください</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="password" class="col-md-5 col-form-label text-md-left">パスワード<span
                                class="ml-1 abroading-app-require-input-label"><span
                                    class="abroading-app-require-input-label-text"
                                    style="color: red; margin-left:8px">必須</span></span></label>

                        <div class="col-md-7">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror abroading-app-login-input"
                                name="password" required autocomplete="new-password" placeholder="パスワード">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-5 col-form-label text-md-left"></label>

                        <div class="col-md-7">
                            <input id="password-confirm" type="password" class="form-control abroading-app-login-input"
                                name="password_confirmation" required autocomplete="new-password" placeholder="パスワード確認用">
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 16px">
                        <button type="submit" class="btn btn-success w-100">
                            アカウント作成
                        </button>
                    </div>
                </form>
                <div style="margin-top: 16px">
                    <a style="text-decoration: none; color:black" href="{{route('top.index')}}">&lt;TOPに戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection

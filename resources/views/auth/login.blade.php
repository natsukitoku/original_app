@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="mt-4 mb-3">ログイン</h3>

                <hr>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror samuraimart-login-input" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>メールアドレスが正しくない可能性があります。</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group" style="margin-top: 16px">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror samuraimart-login-input"
                            name="password" required autocomplete="current-password" placeholder="パスワード">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>パスワードが正しくない可能性があります。</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group" style="margin-top: 8px">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label samuraimart-check-label w-100" for="remember">
                                次回から自動的にログインする
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="mt-3 w-100 btn btn-success">
                            ログイン
                        </button>

                        <a class="btn btn-link mt-3 d-flex justify-content-center samuraimart-login-text"
                            href="{{ route('password.request') }}">
                            パスワードをお忘れの場合
                        </a>
                    </div>
                </form>

                <hr>

                <div class="form-group">
                    <a class="btn btn-link mt-3 d-flex justify-content-center samuraimart-login-text"
                        href="{{ route('register') }}">
                        新規登録
                    </a>
                </div>
                <div style="margin-top: 16px">
                    <a style="text-decoration: none; color:black" href="{{route('top.index')}}">&lt;TOPに戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection

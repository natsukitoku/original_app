@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">パスワード変更</h1>
    <div style="margin-bottom: 24px; margin-top:24px">
        <a class="back" href="{{route('mypage.edit')}}">&lt;戻る</a>
    </div>
    <div style="margin-left: 48px">
        <form method="POST" action="{{ route('mypage.update_password') }}">
            @csrf
            @method('PUT')
            <div>
                <label for="password">新しいパスワード</label>
                <div>
                    <input id="password" type="password" @error('password') id-invalid
                    @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password-confirm">確認用</label>

                <div>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div style="margin-top: 16px; margin-left: 48px">
                <button type="submit">
                    パスワード更新
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


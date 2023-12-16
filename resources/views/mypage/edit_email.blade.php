@extends('layouts.app')

@section('content')
    <h1 style="margin-top: 32px">メールアドレスの変更</h1>
    <div>
        <a class="back" href="{{ route('mypage.edit') }}">戻る</a>
    </div>

    <form method="POST" action="{{ route('mypage.update_email') }}">
        @csrf
        @method('PUT')
        <div>
            <label for="email">新しいメールアドレス</label>
            <div>
                <input id="email" type="email" @error('email') id-invalid
          @enderror" name="email" required
                    autocomplete="new-email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label for="email-confirm">確認用</label>
            <div>
                <input id="email-confirm" type="email" name="email_confirmation" required autocomplete="new-email">
            </div>
        </div>

        <div>
            <button type="submit">
                メールアドレス更新
            </button>
        </div>
    </form>
@endsection

@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">メールアドレスの変更</h1>
    <div style="margin-bottom: 24px; margin-top:24px">
        <a class="back" href="{{ route('mypage.edit') }}">&lt;戻る</a>
    </div>

    <div style="margin-left: auto; margin-right: auto">
        <form method="POST" action="{{ route('mypage.update_email') }}">
            @csrf
            @method('PUT')
            <div>
                <label for="email">新しいメールアドレス</label>
                <div>
                    <input id="email" class="form-control" type="email" @error('email') id-invalid
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
                    <input id="email-confirm" type="email" class="form-control"  name="email_confirmation" required autocomplete="new-email">
                </div>
            </div>

            <div style="margin-top: 16px; text-align: right">
                <button type="submit" class="btn btn-outline-success">
                    メールアドレス更新
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

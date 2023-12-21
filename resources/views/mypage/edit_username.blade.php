@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">ユーザー名の変更</h1>
    <div style="margin-bottom: 24px; margin-top:24px">
        <a class="back" href="{{ route('mypage.edit') }}">&lt;戻る</a>
    </div>

    <div style="width: 560px; margin-right:auto; margin-left:auto">
        <form method="POST" action="{{ route('mypage.update_username') }}">
            @csrf
            @method('PUT')
            <div>
                <label for="name">新しいユーザー名</label>
                <div>
                    <input id="name" class="form-control" type="name"  class="form-control @error('username') id-invalid
              @enderror" name="name" required>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div style="margin-top: 16px; text-align: right">
                <button type="submit" class="btn btn-outline-success">
                    ユーザー名更新
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">気になる国一覧</h1>

    <div style="margin-bottom: 24px; margin-top:24px">
        <a class="back" href="{{ route('mypage.setting') }}">&lt;戻る</a>
    </div>
    <div style="margin-left: 88px">
        @foreach ($favorites as $fav)
            <ul style="line-height: 2">
                <li style="font-size: 16px">{{ App\Models\Country::find($fav->favoriteable_id)->name }}</li>
            </ul>
        @endforeach
    </div>
</div>
@endsection

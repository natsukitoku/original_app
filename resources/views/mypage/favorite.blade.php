@extends('layouts.app')

@section('content')
    <h1>気になる国一覧</h1>
    <div>
        <a href="{{ route('mypage') }}">&lt;戻る</a>
    </div>
    <div>
        @foreach ($favorites as $fav)
            <ul>
                <li>{{ App\Models\Country::find($fav->favoriteable_id)->name }}</li>
            </ul>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div style="margin: 24px">
        <div style="margin-top: 24px">
            <h1>留学先</h1>
        </div>
        <div>
            <a href="{{route('mypage')}}">戻る</a>
        </div>
        <div>
            <a href="{{ route('mypage.create.plans') }}">新規登録する</a>
        </div>
        @foreach ($abroadingplans as $abroadingplan)
            <div style="border: 1px solid; margin: 8px">
                <div>
                    <p>都市名：{{ $abroadingplan->city->name }}</p>
                </div>
                <div>
                    <p>いつから？：{{ $abroadingplan->from_date }}</p>
                </div>
                <div>
                    <p>いつまで？：{{ $abroadingplan->end_date }}</p>
                </div>
                <a href="{{ route('mypage.edit.plans', $abroadingplan) }}">編集</a>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h1>留学先</h1>
    <div>
        <a href="{{ route('mypage') }}">&lt;戻る</a>
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
            <form action="{{ route('mypage.abroadingplan.destroy', $abroadingplan) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" value="{{ $abroadingplan->id }}">
                <button type="submit">削除</button>
            </form>
        </div>
    @endforeach
    </div>
@endsection

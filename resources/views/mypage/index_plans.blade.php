@extends('layouts.app')

@section('content')
    <div class="all">
        <h1 style="margin-top: 32px">留学先</h1>
        <div style="display: flex; justify-content: space-between">

            <div style="margin-bottom: 24px; margin-top:24px">
                <a class="back" href="{{ route('mypage.setting') }}">&lt;戻る</a>
            </div>
            <div style="margin-top: 40px; margin-right: 56px">
                <a class="link link-menu" href="{{ route('mypage.create.plans') }}">新規登録する</a>
            </div>
        </div>
        @foreach ($abroadingplans as $abroadingplan)
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between">
                        <div>
                            <p style="font-size: 24px">都市名：{{ $abroadingplan->city->name }}</p>
                        </div>
                        <div style="display: flex">
                            <div style="margin-top: 8px; margin-right: 8px">
                                <a class="link link-menu" href="{{ route('mypage.edit.plans', $abroadingplan) }}">編集</a>
                            </div>
                            <form action="{{ route('mypage.destroy.plans', $abroadingplan) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" value="{{ $abroadingplan->id }}">
                                <button type="submit" class="btn btn-outline-danger">削除</button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <p style="font-size: 16px">いつから？：{{ $abroadingplan->from_date }}</p>
                    </div>
                    <div>
                        <p style="font-size: 16px">いつまで？：{{ $abroadingplan->end_date }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection

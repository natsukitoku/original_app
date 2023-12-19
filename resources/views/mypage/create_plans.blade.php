@extends('layouts.app')

@section('content')
    <div class="all">
        <h1 style="margin-top: 32px">留学予定登録</h1>
        <div style="margin-bottom: 24px; margin-top:24px">
            <a class="back" href="{{ route('mypage.index.plans') }}">&lt;戻る</a>
        </div>
        <div style="margin-left: 88px">
            <form method="POST" action="{{ route('mypage.plans') }}">
                @csrf
                <div>
                    <label for="countries">行き先選択</label>
                    <select id="cities" name='city_id'>
                        @foreach ($countries as $country)
                            <optgroup label="{{ $country->name }}">
                                @foreach ($country->cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div style="margin-top: 24px">
                    <div style="margin-bottom: 8px">
                        <label for="fromdate">いつから?</label>
                        <input type="date" id="date" name="from_date" value="">
                    </div>
                    <div>
                        <label for="enddate">いつまで?</label>
                        <input type="date" id="date" name="end_date" value="">
                    </div>
                </div>
                <div style="margin-left: 160px; margin-top: 32px">
                    <button type="submit" class="btn btn-outline-success">登録する</button>
                </div>
            </form>
        </div>
    </div>
@endsection

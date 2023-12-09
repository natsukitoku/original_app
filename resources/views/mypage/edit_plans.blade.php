@extends('layouts.app')

@section('content')

        <h1>留学予定編集</h1>
    <div>
        <a href="{{ route('mypage.index.plans') }}">&lt;戻る</a>
    </div>

    <form method="POST" action="{{ route('mypage.plans') }}">
        @csrf
        <div style="margin: 24px">
            <label for="countries">国名選択</label>
            <select name="country_id" id="countries">
                @foreach ($countries as $country)
                    @if ($abroadingplan->city->country_id == $country->id)
                        <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                    @else
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div style="margin: 24px">
            <label for="city">都市名</label>
            <select name="city_id" id="cities">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin: 24px">
            <div style="margin-bottom: 8px">
                <label for="fromdate">いつから?</label>
                <input type="date" id="date" name="from_date" value="{{ $abroadingplan->from_date }}">
            </div>
            <div>
                <label for="enddate">いつまで?</label>
                <input type="date" id="date" name="end_date" value="{{ $abroadingplan->end_date }}">
            </div>
        </div>
        <button type="submit">登録する</button>
    </form>
@endsection

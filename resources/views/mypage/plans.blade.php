@extends('layouts.app')

@section('content')

    <div style="margin: 80px">
        <h1>留学予定登録</h1>
    </div>

    <form method="POST" action="{{ route('mypage.plans') }}">
        @csrf
        <div style="margin: 24px">
            <label for="countries">国名選択</label>
            <select name="country_id" id="countries">
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
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
                <input type="date" id="date" name="from_date" value="">
            </div>
            <div>
                <label for="enddate">いつまで?</label>
                <input type="date" id="date" name="end_date" value="">
            </div>
        </div>
        <button type="submit">登録する</button>
    </form>

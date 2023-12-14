@extends('layouts.app')

@section('content')
    <h1>留学予定編集</h1>
    <div>
        <a href="{{ route('mypage.index.plans') }}">&lt;戻る</a>
    </div>

    <form method="POST" action="{{ route('mypage.update.plans', $abroadingplan) }}">
        @csrf
        @method('PUT')
        <label for="countries">行き先選択</label>
        <select id="cities" name='city_id'>
            @foreach ($countries as $country)
                <optgroup label="{{ $country->name }}">
                    @foreach ($country->cities as $city)
                    @if ($abroadingplan->city->id == $city->id)
                    <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                    @else
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endif
                    @endforeach
                </optgroup>
            @endforeach
        </select>
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

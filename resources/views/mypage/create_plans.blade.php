@extends('layouts.app')

@section('content')
    <h1>留学予定登録</h1>
    <div>
        <a href="{{route('mypage.index.plans')}}">&lt;戻る</a>
    </div>
    <form method="POST" action="{{ route('mypage.plans') }}">
        @csrf
        <div style="margin: 24px">
            <label for="countries">国名選択</label>
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
@endsection

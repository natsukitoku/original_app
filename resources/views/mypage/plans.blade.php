@extends('layouts.app')

@section('content')

<div style="margin: 80px">
    <h1>留学予定登録</h1>
</div>

<form method="POST" action="route('mypage.plans') }}">
    @csrf
    <div style="margin: 24px">
        <label for="countries">国名選択</label>
        <select name="countries" id="countries">
                @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
        </select>
    </div>
    <div style="margin: 24px">
        <div style="margin-bottom: 8px">
            <label for="fromdate">いつから?</label>
            <input type="date" id="date" name="fromdate" value="">
        </div>
        <div>
            <label for="enddate">いつまで?</label>
            <input type="date" id="date" name="enddate" value="">
        </div>
    </div>
     <button type="submit">登録する</button>
</form>

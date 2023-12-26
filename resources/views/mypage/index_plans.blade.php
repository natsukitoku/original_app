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
        @foreach ($abroadingPlans as $abroadingPlan)
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between">
                        <div>
                            <p style="font-size: 24px">都市名：{{ $abroadingPlan->city->name }}</p>
                        </div>
                        <div style="display: flex">
                            <div style="margin-top: 8px; margin-right: 8px">
                                <a class="link link-menu" style="border: none"
                                    href="{{ route('mypage.edit.plans', $abroadingPlan) }}"><i
                                        class="far fa-edit fa-lg"></i></a>
                            </div>
                            <form action="{{ route('mypage.destroy.plans', $abroadingPlan) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                @if (in_array($abroadingPlan->id, $abroadingPlanIdsInTodos))
                                    <div class="deletePlan">
                                        <span class="alert" style="color: red">Todoに紐付けされているため<br>削除できません！</span>
                                        <button type="submit" class="btn plansBtn" style="border: none" disabled><i
                                                class="fas fa-trash-alt fa-lg"></i></button>
                                    </div>
                                @else
                                    <div>
                                        <button type="submit" class="btn" style="border: none"><i
                                                class="fas fa-trash-alt fa-lg"></i></button>
                                    </div>
                                @endif
                                <input type="hidden" value="{{ $abroadingPlan->id }}">
                            </form>
                        </div>
                    </div>
                    <div>
                        <p style="font-size: 16px">いつから？：{{ $abroadingPlan->from_date }}</p>
                    </div>
                    <div>
                        <p style="font-size: 16px">いつまで？：{{ $abroadingPlan->end_date }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection

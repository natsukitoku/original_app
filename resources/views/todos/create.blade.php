@extends('layouts.app')

@section('content')
<div class="all">
    <h1 style="margin-top: 32px">Todoリストの作成</h1>
    <div>
        <a class="back" href="{{ route('todos.index') }}">&lt;戻る</a>
    </div>
    <div>
        <div style="margin-left: 88px">
            <form method="POST" action="{{ route('todos.store') }}">
                @csrf
                <div style="margin-top: 32px">
                    @error('priority_num')
                        <strong>優先度を選択してください</strong>
                    @enderror
                    <label for="priority_num">優先度選択</label>
                    <select name="priority_num" id="priority_num">
                        <option hidden>選択して下さい</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div style="margin-top:8px">
                    @error('duedate')
                        <strong>期限を選択してください。</strong>
                    @enderror
                    <label for="duedate">期限</label>
                    <input type="date" id="duedate" name="duedate" value="">
                </div>
                <div style="margin-top:8px">
                    @error('city_id')
                        <strong>紐付ける留学先を選択してください。</strong>
                    @enderror
                    <label for="abroading_plan">留学先</label>
                    <select name="abroading_plan_id" id="abroading_plan_id">
                        @foreach ($abroading_plans as $abroading_plan)
                            <option value="{{ $abroading_plan->id }}">{{ $abroading_plan->city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div style="margin-top: 32px">
                    @error('content')
                        <strong>タスクを入力してください。</strong>
                    @enderror
                    <textarea name="content" id="content" placeholder="タスク内容" rows="10" cols="30"></textarea>
                </div>
                <div style="display: flex">
                    <label for="public"><input type="radio" name="is_public" value="0">公開</label>
                    <label for="private"><input type="radio" name="is_public" value="1">非公開</label>
                </div>
                <input type="hidden" name="done" value="0">
                <div style="margin-top: 16px; margin-left: 194px">
                    <button class="btn btn-outline-success" type="submit">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

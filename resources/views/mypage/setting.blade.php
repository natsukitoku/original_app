@extends('layouts.app')

@section('content')
    <div class="all">
        <h1 style="margin-top: 32px">設定</h1>
        <div style="margin-bottom: 24px; margin-top:24px">
            <a class="back" href="{{ route('mypage') }}">&lt;戻る</a>
        </div>

        <div style="width: 480px; margin-left:auto; margin-right:auto">
            <ul style="list-style: none">
                <li>
                    <i class="far fa-user fa-2x" style="margin-right: 8px"></i>
                    <a class="link" href="{{ route('mypage.edit') }}">アカウント情報登録
                        <i class="fas fa-chevron-right fa-2x" style="float:right; font-size:24px"></i>
                    </a>
                </li>
                <hr>
                <li>
                    <i class="fas fa-globe-asia fa-2x" style="margin-right: 8px"></i>
                    <a class="link" href="{{ route('mypage.favorites') }}">気になる国一覧
                        <i class="fas fa-chevron-right fa-2x" style="float: right;font-size:24px"></i>
                    </a>
                </li>
                <hr>
                <li>
                    <i class="fas fa-plane-departure fa-2x" style="margin-right: 8px"></i>
                    <a class="link" href="{{ route('mypage.index.plans') }}">留学予定
                        <i class="fas fa-chevron-right fa-2x" style="float: right;font-size:24px"></i>
                    </a>
                </li>
                <hr>
                <li style="display: flex; justify-content:space-between">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#logoutModal" style="border: none;padding: 0"><i class="fas fa-sign-out-alt fa-2x"
                        style="margin-right:8px"></i>
                        ログアウト
                    </button>
                    <i class="fas fa-chevron-right fa-2x" style="font-size:24px"></i>
                </li>
            </ul>
        </div>
    </div>
    <!--logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="logoutModalLabel">ログアウト</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ログアウトしますか？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">ログアウト</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $followees = Auth::user()->followees;

        return view('follows.index', compact('followees'));
    }


    public function search_friends()
    {
        // フォローしているユーザーの情報を取得
        $followees = Auth::user()->followees;

        // ユーザーのCollection(配列の拡張)から、pluckメソッドを使って、idだけを抜き出す
        // CollectionをtoArrayで純粋な配列に変換
        $followeeIds = $followees->pluck('id')->toArray();

        // 検索対象外としたい無視するIDのリストを生成
        // フォロー済みのユーザーIDの配列と自分のIDをarray_merge使ってマージする
        $ignoreIds = array_merge($followeeIds, [Auth::id()]);

        // whereNotInを使うことで、第二引数に指定されたidの配列を含まないユーザーのみを抽出する
        $users = User::whereNotIn('id', $ignoreIds)->get();

        return view('follows.search_friends', compact('users'));
    }

    public function register_friends(Request $request)
    {
        $followee_id = $request->input('followee_id');
        $user = Auth::user();
        $user->followees()->attach($followee_id);

        return to_route('follows.search_friends');
    }
}

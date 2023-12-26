<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\AbroadingPlan;
use App\Models\Comment;
use App\Models\Todo;
use App\Models\Tweet;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class MyPageController extends Controller
{

    // マイページ
    public function mypage()
    {
        $user = Auth::user();


        $todos = Todo::where('user_id', '=', Auth::id())->where('is_public', '=', '0')->get();

        $tweets = Tweet::where('user_id', '=', Auth::id())->get();

        // $tweetIds = $tweets->pluck('id')->toArray();

        // $comments = Comment::whereIn('tweet_id', '=', $tweetIds)->toArray();

        // dd($comments);

        $unWatchedCommentTweet = Tweet::with(['comments' => function ($query) {
            $query->where('watched', '=', 0);
        }])->get();

        $nestedIds = $unWatchedCommentTweet->pluck('comments.*.id');

        $unWatchedCommentIds = array_merge(...$nestedIds);


        $favorites = $user->favorites(Country::class)->get();

        $abroadingPlans = AbroadingPlan::where('user_id', '=', Auth::id())->get();


        $done_count = Todo::where('user_id', '=', Auth::id())->where('done', '=', '1')->count();



        return view('mypage.mypage', compact('user', 'todos', 'tweets', 'favorites', 'abroadingPlans', 'done_count', 'unWatchedCommentIds'));
    }

    // 設定画面
    public function setting()
    {
        $user = Auth::user();

        return view('mypage.setting', compact('user'));
    }

    // パスワード更新ページ
    public function edit_password()
    {
        return view('mypage.edit_password');
    }

    // パスワード更新機能
    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if ($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->save();
        } else {
            return to_route('mypage.edit_password');
        }

        return to_route('mypage.edi');
    }


    public function edit_account(User $user)
    {
        $user = Auth::user();

        return view('mypage.edit_acount', compact('user'));
    }

    // メールアドレス変更ページ
    public function edit_email()
    {
        return view('mypage.edit_email');
    }

    // メールアドレス更新機能
    public function update_email(Request $request)
    {
        $request->validate([
            'email' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if ($request->input('email') == $request->input('email_confirmation')) {
            $user->email = $request->input('email');
            $user->save();
        } else {
            return to_route('mypage.edit_email');
        }

        return to_route('mypage.edit');
    }

    // ユーザー名の変更ページ
    public function edit_username()
    {
        return view('mypage.edit_username');
    }

    // ユーザー名の更新機能
    public function update_username(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->save();

        return to_route('mypage.edit');
    }


    // // 登録情報更新機能
    // public function update_account(Request $request, User $user)
    // {
    //     $user = Auth::user();

    //     $user->name = $request->input('name') ? $request->input('name') : $user->name;
    //     $user->email = $request->input('email') ? $request->input('email') : $user->email;
    //     $user->save();

    //     return to_route('mypage');
    // }

    // 気になる国登録機能
    public function favorite()
    {
        $user = Auth::user();

        $favorites = $user->favorites(Country::class)->get();

        return view('mypage.favorite', compact('favorites'));
    }

    // 留学先表示
    public function index_abroading_plans()
    {
        $abroadingPlans = AbroadingPlan::where('user_id', '=', Auth::id())->get();

        $todos = Todo::where('user_id', '=', Auth::id())->get();

        $abroadingPlanIdsInTodos = $todos->pluck('abroading_plan_id')->toArray();

        return view('mypage.index_plans', compact('abroadingPlans','abroadingPlanIdsInTodos'));
    }

    public function create_abroading_plans(Country $country)
    {
        $countries = Country::with('cities')->get();

        return view('mypage.create_plans', compact('countries'));
    }

    public function edit_abroading_plans(Country $countries, AbroadingPlan $abroadingplan)
    {
        $countries = Country::all();
        $cities = City::all();

        return view('mypage.edit_plans', compact('countries', 'cities', 'abroadingplan'));
    }

    public function update_abroading_plans(Request $request, AbroadingPlan $abroadingplan)
    {
        $request->validate([
            'city_id' => 'required',
            'from_date' => 'required',
            'end_date' => 'required',
        ]);

        $abroadingplan->user_id = Auth::id();
        $abroadingplan->city_id = $request->input('city_id');
        $abroadingplan->from_date = $request->input('from_date');
        $abroadingplan->end_date = $request->input('end_date');
        $abroadingplan->save();

        return to_route('mypage.index.plans');
    }

    public function store_abroading_plans(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'from_date' => 'required',
            'end_date' => 'required',
        ]);

        $abroadingplan = new AbroadingPlan();
        $abroadingplan->user_id = Auth::id();
        $abroadingplan->city_id = $request->input('city_id');
        $abroadingplan->from_date = $request->input('from_date');
        $abroadingplan->end_date = $request->input('end_date');
        $abroadingplan->save();


        return to_route('mypage.index.plans');
    }

    public function destroy_abroading_plans(AbroadingPlan $abroadingplan)
    {

        $abroadingplan->delete();

        return to_route('mypage.index.plans');
    }
}

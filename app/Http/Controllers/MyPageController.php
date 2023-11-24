<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\AbroadingPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class MyPageController extends Controller
{

    public function mypage() {
        $user = Auth::user();

        return view('mypage.mypage', compact('user'));
    }

    public function update_password(Request $request) {
        $validateDate = $request->validate([
            'password' => 'required|confirmed',
        ]);

            $user = Auth::user();

            if($request->input('password') == $request->input('password_confirmation')) {
                $user->password = bcrypt($request->input('password'));
                $user->update();
            } else {
                return to_route('mypage.edit_password');
            }

            return to_route('mypage');
    }

    public function edit_password()
    {
        return view('mypage.edit_password');
    }

    public function edit_account(User $user) {
        $user = Auth::user();

        return view('mypage.edit_acount', compact('user'));
    }

    public function update_account(Request $request, User $user) {
        $user = Auth::user();

        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        $user->update();

        return to_route('mypage');
    }

    public function favorite() {
        $user = Auth::user();

        $favorites = $user->favorites(Country::class)->get();

        return view('mypage.favorite', compact('favorites'));
    }

    // public function store_abroading_plans(Request $request, User $user) {
    //     // $user = Auth::user();

    //     $abroadingplan = new AbroadingPlan;
    //     $abroadingplan->user_id = Auth::user();
    //     $abroadingplan->city_id = $request->city_name;
    //     $abroadingplan->from_date = $request->


    // }
}

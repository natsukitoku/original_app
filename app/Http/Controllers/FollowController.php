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
        $users = User::where('id', '!=', Auth::id())->get();

        // $followees = Auth::user()->followees;

        // todo 友達に追加した人は出てこないようにする


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

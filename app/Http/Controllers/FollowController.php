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
    public function index(Follow $followee)
    {
        $followees = Follow::where('follower_id', '=', Auth::id())->get();

        return view('follows.index', compact('followees'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function edit(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Follow $follow)
    {
        //
    }


    public function search_friends()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        $followees = Follow::where('follower_id', '=', Auth::id())->get();

        // todo 友達に追加した人は出てこないようにする

        return view('follows.search_friends', compact('users','followees'));
    }

    public function register_friends(Request $request)
    {
        $followee_id = $request->input('followee_id');
        $user = Auth::user();
        $user->followees()->attach($followee_id);

        return to_route('follows.search_friends');
    }
}

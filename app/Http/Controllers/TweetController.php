<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 一覧ページ
    public function index()
    {
        $tweets = Tweet::latest()->with('user')->get();

        $unWatchedCommentTweet = Tweet::with(['comments' => function($query) {
            $query->where('watched', '=', 0);
        }])->get();

        $nestedIds = $unWatchedCommentTweet->pluck('comments.*.id');

        $unWatchedCommentIds = array_merge(...$nestedIds);

        // 未読コメントを既読に一括更新
        Comment::whereIn('id', $unWatchedCommentIds)->update(['watched' => 1]);

        return view('tweets.index', compact('tweets', 'unWatchedCommentIds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tweet $tweet)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $tweet = new Tweet();
        $tweet->user_id = Auth::user()->id;
        $tweet->content = $request->input('content');
        // $tweet->image
        $tweet->save();

        return to_route('tweets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('tweets.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
        return view('tweets.edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tweet $tweet)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $tweet->content = $request->input('content');
        $tweet->save();

        return to_route('tweets.index', $tweet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return to_route('tweets.index');
    }
}

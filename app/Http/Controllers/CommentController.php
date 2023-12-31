<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する
        $this->middleware('auth');
    }

    public function create(Tweet $tweet)
    {
        return view('comments.create', compact('tweet'));
    }

    public function store(Request $request, Tweet $tweet)
    {
        $comment = new Comment();
        $comment->tweet_id = $tweet->id;
        $comment->user_id = Auth::id();
        $comment->content = $request->input('content');
        $comment->save();

        return to_route('tweets.index');
    }

    public function update(Request $request, Comment $comment, Tweet $tweet)
    {
        $comment->watched = $request->input('watched');
        $comment->save();

        $unwatched = $comment;

        $tweets = Tweet::latest()->with('user')->get();

        return view('tweets.index', compact('unwatched', 'tweets'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return to_route('tweets.index');
    }
}

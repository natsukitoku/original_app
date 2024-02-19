<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AbroadingPlan;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();

        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $today = Carbon::today();

        $abroadingPlan = AbroadingPlan::where('user_id', '=', Auth::id())->where('end_date', '<', $today)->where('reviewed', '=', '0')->first();


        return view('reviews.create', compact('abroadingPlan'));
    }

    public function store(Request $request, AbroadingPlan $abroadingPlan)
    {
        $request->validate([
            'abroading_plan_id' => 'required',
            'recommendation_stars' => 'required',
            'content' => 'required',
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->abroading_plan_id = $request->input('abroading_plan_id');
        $review->city_id = $abroadingPlan->city_id;
        $review->recommendation_stars = $request->input('recommendation_stars');
        $review->content = $request->input('content');
        $review->save();

        AbroadingPlan::where('id', '=', $abroadingPlan->id)->update(['reviewed' => 1]);

        return to_route('reviews.index');
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));

    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'abroading_plan_id' => 'required',
            'recommendation_stars' => 'required',
            'content' => 'required',
        ]);

        $review->user_id = Auth::id();
        $review->abroading_plan_id = $request->input('abroading_plan_id');
        $review->city_id = $review->city_id;
        $review->recommendation_stars = $request->input('recommendation_stars');
        $review->content = $request->input('content');
        $review->save();

        return to_route('reviews.index');
    }
}



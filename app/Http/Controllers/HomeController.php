<?php

namespace App\Http\Controllers;

use App\Models\AbroadingPlan;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use App\Models\VisaInformation;
use DateTime;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Country $country, VisaInformation $visaInformation, AbroadingPlan $abroadingPlan)
    {
        $user = Auth::user();

        $countries = Country::all();

        // $from_date = AbroadingPlan::where('user_id', '=', Auth::id())->latest()->get();

        // $now = new DateTime('now');

        // $time = $now->diff($from_date);

        return view('home', compact('countries', 'user'));
    }
}

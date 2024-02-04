<?php

namespace App\Http\Controllers;

use App\Models\AbroadingPlan;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use App\Models\VisaInformation;
use App\Models\Todo;
use Carbon\Carbon;
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


        // $now = new DateTime('now');

        $today = Carbon::today();


        $abroadingPlans = AbroadingPlan::where('user_id', '=', Auth::id())->where('end_date', '>=', $today)->orderBY('end_date', 'ASC')->get();



        return view('home', compact('countries', 'user', 'abroadingPlans'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AbroadingPlan;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\VisaInformation;

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
        $countries = Country::all();

        // $datetime = AbroadingPlan::where()

        return view('home', compact('countries'));
    }
}

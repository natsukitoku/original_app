<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    public function favorite(Country $country)
    {
        Auth::user()->togglefavorite($country);

        return back();
    }

}

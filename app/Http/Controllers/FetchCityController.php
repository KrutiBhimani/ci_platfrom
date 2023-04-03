<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class FetchCityController extends Controller
{
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("country_id", $request->get('country_id'))->get();
        return response()->json($data);
    }
}
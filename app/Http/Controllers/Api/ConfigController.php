<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Country;
use App\Models\City;
use App\Models\District;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config = Config::all();

        $data = [];
        foreach ($config as $item) {
            $data[$item->type] = $item->value;
        }

        return response()->json(['status' => true, 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showcountries()
    {
        $countries = Country::all();
        return response()->json(['status' => true, 'data' => $countries]);
    }

    public function showcities(string $id)
    {
        $cities = City::where('country_id', $id)->get();
        return response()->json(['status' => true, 'data' => $cities]);
    }

    public function showdistricts(string $id)
    {
        $districts = District::where('city_id', $id)->get();
        return response()->json(['status' => true, 'data' => $districts]);
    }
}

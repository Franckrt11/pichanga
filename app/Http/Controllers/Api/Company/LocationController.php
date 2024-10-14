<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\CompanyActivityLog;

class LocationController extends Controller
{
    public function index(string $id)
    {
        $list = Location::with('district')->where('company_id', $id)->get();

        return response()->json(['status' => true, 'data' => $list]);
    }

    public function show(string $id)
    {
        $location = Location::with(['district', 'country', 'city'])->findOrFail($id);
        return response()->json(['status' => true, 'data' => $location]);
    }

    public function store(Request $request)
    {
        $location = Location::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'parking' => $request->parking,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'address' => $request->address,
            'map_latitude' => $request->map_latitude,
            'map_longitude' => $request->map_longitude,
            'active' => TRUE,
            'company_id' => $request->company_id
        ]);

        CompanyActivityLog::create([
            'message' => 'Has registrado un nuevo local como '.$location ->name,
            'company_id' => $request->company_id
        ]);

        return response()->json(['status' => true, 'data' => ['id' => $location->id]]);
    }

    public function update(Request $request, string $id)
    {
        $location = Location::findOrFail($id);

        $location->name = $request->name;
        $location->phone = $request->phone;
        $location->mobile = $request->mobile;
        $location->parking = $request->parking;
        $location->country_id = $request->country_id;
        $location->city_id = $request->city_id;
        $location->district_id = $request->district_id;
        $location->address = $request->address;
        $location->map_latitude = $request->map_latitude;
        $location->map_longitude = $request->map_longitude;

        if (isset($request->active)) {
            $location->active = $request->active;
        }

        $location->save();

        return response()->json(['status' => true, 'data' => $location]);
    }

    public function changestatus(Request $request, string $id)
    {
        $location = Location::findOrFail($id);
        $location->active = $request->active;
        $location->save();
        return response()->json(['status' => true, 'message' => 'El estado del local ha sido cambiado.']);
    }
}

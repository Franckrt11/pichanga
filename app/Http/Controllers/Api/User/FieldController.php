<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;

class FieldController extends Controller
{
    public function index()
    {
        $list = Field::take(20)->get();
        return response()->json(['status' => true, 'data' => $list]);
    }

    public function nearby(Request $request)
    {
        $nearby = Field::with('company')
        ->select('id', 'name', 'country', 'city', 'district', 'address', 'map_latitude', 'map_longitude', 'portrait', 'company_id')
        ->where('active', 1)
        ->nearby([
            $request->latitude,
            $request->longitude
        ],$request->distance)->get();
        return response()->json(['status' => true, 'data' => $nearby]);
    }
}

<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\FieldImage;

class FieldController extends Controller
{
    public function index()
    {
        $list = Field::take(20)->get();
        return response()->json(['status' => true, 'data' => $list]);
    }

    public function show(string $id)
    {
        $field = Field::with(['company', 'district', 'city', 'country'])->findOrFail($id);
        return response()->json(['status' => true, 'data' => $field]);
    }

    public function nearby(Request $request)
    {
        $nearby = Field::with(['company', 'district', 'city', 'country'])
        // ->select('id', 'name', 'country', 'city', 'district', 'address', 'map_latitude', 'map_longitude', 'portrait', 'company_id')
        ->where('active', 1)
        ->nearby([
            $request->latitude,
            $request->longitude
        ],$request->distance)->get();

        // $nearby = Field::with(['company', 'district'])
        // // ->select('id', 'name', 'country', 'city', 'district', 'address', 'map_latitude', 'map_longitude', 'portrait', 'company_id')
        // ->where('active', 1)
        // // ->nearby([
        // //     $request->latitude,
        // //     $request->longitude
        // // ],$request->distance)
        // ->get();
        return response()->json(['status' => true, 'data' => $nearby]);
    }

    public function picture(string $id)
    {
        $pictures = FieldImage::where('field_id', intval($id))->orderBy('position')->get();
        return response()->json(['status' => true, 'data' => $pictures]);
    }
}

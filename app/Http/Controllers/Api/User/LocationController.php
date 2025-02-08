<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function nearby(Request $request)
    {
        $nearby = Location::with(['company', 'district', 'fields'])
        ->where('active', 1)
        ->nearby([
            $request->latitude,
            $request->longitude
        ],$request->distance)->get();

        $fields = $this->extractFieldFromLocation($nearby);
        return response()->json(['status' => true, 'data' => $fields]);
    }

    private function extractFieldFromLocation($locations)
    {
        $fields = [];
        foreach ($locations as $location) {
            foreach ($location->fields as $field) {
                $fields[] = [
                    'name' => $location->name,
                    'portrait' => $field->portrait,
                    'games' => $field->games,
                    'rating' => $field->score,
                    'district' => $location->district->name,
                    'map_latitude' => $location->map_latitude,
                    'map_longitude' => $location->map_longitude
                ];
            }
        }
        return $fields;
    }
}

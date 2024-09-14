<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\CompanyActivityLog;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $list = Field::with('district')->where('company_id', intval($id))->get();
        return response()->json(['status' => true, 'data' => $list]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = Field::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'parking' => $request->parking,
            'size' => $request->size,
            'type' => $request->type,
            'players' => $request->players,
            'games' => $request->games,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'address' => $request->address,
            'map_latitude' => $request->map_latitude,
            'map_longitude' => $request->map_longitude,
            'active' => FALSE,
            'company_id' => $request->company_id
        ]);

        CompanyActivityLog::create([
            'message' => 'Has registrado una nueva cancha como '.$field ->name,
            'company_id' => $request->company_id
        ]);

        return response()->json(['status' => true, 'data' => ['id' => $field->id]]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $field = Field::with(['company', 'district', 'city', 'country'])->findOrFail($id);
        return response()->json(['status' => true, 'data' => $field]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $field = Field::findOrFail($id);

        $field->name = $request->name;
        $field->phone = $request->phone;
        $field->mobile = $request->mobile;
        $field->parking = $request->parking;
        $field->size = $request->size;
        $field->type = $request->type;
        $field->players = $request->players;
        $field->games = $request->games;
        $field->country_id = $request->country_id;
        $field->city_id = $request->city_id;
        $field->district_id = $request->district_id;
        $field->address = $request->address;
        $field->map_latitude = $request->map_latitude;
        $field->map_longitude = $request->map_longitude;

        if (isset($request->active)) {
            $field->active = $request->active;
        }

        if (isset($request->portrait)) {
            $field->portrait = $request->portrait;
        }

        $field->save();

        return response()->json(['status' => true, 'data' => $field]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function portrait(Request $request, string $id)
    {
        $field = Field::findOrFail($id);

        if ($field->portrait) {
            Storage::disk('public')->delete("company/field/{$field->portrait}");
        }

        $timestamp = time();
        $filename = "company-field-{$timestamp}.jpg";
        $image = Image::make($request->picture)->resize(800, 500)->encode('jpg', 60);
        Storage::disk('public')->put("company/field/{$filename}", $image->stream());
        $field->portrait = $filename;
        $field->save();
        return response()->json(['status' => true, 'picture' => $filename]);
    }

    public function remove(string $id)
    {
        $field = Field::findOrFail($id);

        if ($field->portrait) {
            Storage::disk('public')->delete("company/field/{$field->portrait}");
            $field->portrait = NULL;
            $field->save();

            return response()->json(['status' => true, 'data' => 'La portada de la cancha ha sido borrada.']);
        }

        return response()->json(['status' => true, 'data' => 'La cancha no tiene portada.']);
    }

    public function changestatus(Request $request, string $id)
    {
        $field = Field::findOrFail($id);
        $field->active = $request->active;
        $field->save();

        return response()->json(['status' => true, 'message' => 'El estado de la cancha ha sido cambiado.']);
    }
}

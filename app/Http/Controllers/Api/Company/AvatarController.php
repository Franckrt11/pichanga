<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'photo' => 'required'
        ]);

        $company = Company::findOrFail($id);
        if ($company->photo) {
            Storage::disk('public')->delete("company/avatar/{$company->photo}");
        }

        $timestamp = time();
        $filename = "company-avatar-{$timestamp}.jpg";
        $image = Image::make($request->photo)->resize(400, 400)->encode('jpg', 60);
        Storage::disk('public')->put("company/avatar/{$filename}", $image->stream());
        $company->photo = $filename;
        $company->save();
        return response()->json(['status' => true, 'message' => 'Imagen de perfil guardada.', 'photo' => $filename]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        if ($company->photo) {
            Storage::disk('public')->delete("company/avatar/{$company->photo}");
            $company->photo = NULL;
            $company->save();
            return response()->json(['status' => true, 'message' => 'Imagen de perfil borrada.']);
        }
        return response()->json(['status' => false, 'message' => 'No hay imagen de perfil.']);
    }
}

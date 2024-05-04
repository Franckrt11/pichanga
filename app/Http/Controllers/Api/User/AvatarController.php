<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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

        $user = User::findOrFail($id);
        if ($user->photo) {
            Storage::disk('public')->delete("user/avatar/{$user->photo}");
        }

        $timestamp = time();
        $filename = "user-avatar-{$timestamp}.jpg";
        $image = Image::make($request->photo)->resize(400, 400)->encode('jpg', 60);
        Storage::disk('public')->put("user/avatar/{$filename}", $image->stream());
        $user->photo = $filename;
        $user->save();
        return response()->json(['status' => true, 'message' => 'Imagen de perfil guardada.', 'photo' => $filename]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->photo) {
            Storage::disk('public')->delete("user/avatar/{$user->photo}");
            $user->photo = NULL;
            $user->save();
            return response()->json(['status' => true, 'message' => 'Imagen de perfil borrada.']);
        }
        return response()->json(['status' => false, 'message' => 'No hay imagen de perfil.']);
    }
}

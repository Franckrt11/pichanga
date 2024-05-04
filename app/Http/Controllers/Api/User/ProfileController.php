<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
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
        $user = User::findOrFail($id);
        return response()->json(['status' => true, 'data' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|digits:9',
            'email' => 'required|email:rfc',
            'district' => 'required|string'
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->district = $request->district;
        $user->save();

        return response()->json(['status' => true, 'data' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function config(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->{$request->type} = $request->value;
        $user->save();

        return response()->json(['status' => true, 'message' => 'Datos guardados.']);
    }
}

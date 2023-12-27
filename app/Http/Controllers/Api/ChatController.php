<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use Laravel\Sanctum\PersonalAccessToken;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $hashedTooken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($hashedTooken);
        $user = $token->tokenable;
        $type = explode('\\', $token->tokenable_type);
        $role = strtolower($type[2]);
        $chats = Chat::with(['user', 'company'])->where("{$role}_id", $user->id)->get();
        return response()->json(['status' => true, 'data' => $chats]);
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
        $chats = Chat::with(['user', 'company'])->findOrFail($id);
        return response()->json(['status' => true, 'data' => $chats]);
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
}

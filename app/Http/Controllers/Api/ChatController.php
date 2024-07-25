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
        $room = new Chat;
        $room->user_id = $request->user_id;
        $room->company_id = $request->company_id;
        $room->save();

        return response()->json(['status' => true, 'data' => $room->id]);
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

    public function showroom(string $user, string $company) {
        $room = Chat::where("user_id", $user)
                        ->where("company_id", $company)
                        ->first();

        if ($room) {
            return response()->json(['status' => true, 'data' => $room->id ]);
        } else {
            return response()->json(['status' => true, 'data' => false ]);
        }
    }
}

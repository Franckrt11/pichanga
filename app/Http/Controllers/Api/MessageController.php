<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessage;
use App\Models\Chat;

class MessageController extends Controller
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
        $chat = new ChatMessage;
        $chat->message = $request->input('message');
        $chat->sender = $request->input('sender');
        $chat->chat_id = $request->input('chat_id');
        $chat->save();

        $chatRoom = Chat::findOrFail($chat->chat_id);
        $chatRoom->last_message = $chat->message;
        $chatRoom->last_sender = $chat->sender;
        $chatRoom->save();

        return response()->json(['status' => true, 'data' => $chat]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $messages = ChatMessage::where('chat_id', $id)->get();
        return response()->json(['status' => true, 'data' => $messages]);
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

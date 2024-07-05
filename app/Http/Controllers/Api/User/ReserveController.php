<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function index(string $id)
    {
        $reserve = Reserve::with(['field', 'hour'])->where('user_id', $id)->get();
        return response()->json(['status' => true, 'data' => $reserve]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reserve = new Reserve;
        $reserve->date = $request->date;
        $reserve->time = $request->time;
        $reserve->game = $request->game;
        $reserve->price = $request->price;
        $reserve->inscription = $request->inscription;
        $reserve->status = 'pending';
        $reserve->field_hour_id = $request->field_hour_id;
        $reserve->field_id = $request->field_id;
        $reserve->user_id = $request->user_id;
        $reserve->save();

        return response()->json(['status' => true, 'data' => $reserve->id ]);
    }
}

<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\Field;
use App\Models\User;
use App\Models\UserActivityLog;
use App\Models\CompanyActivityLog;

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

        $field = Field::where('id', $request->field_id)->firstOrFail();
        $user = User::where('id', $request->user_id)->firstOrFail();

        UserActivityLog::create([
            'message' => 'Has solicitado la reserva del campo '.$field->name.'.',
            'user_id' => $reserve->user_id
        ]);

        CompanyActivityLog::create([
            'message' => 'El usuario '.$user->name.' ha solicitado la reserva del campo '.$field->name.'.',
            'company_id' => $field->company_id
        ]);

        return response()->json(['status' => true, 'data' => $reserve->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reserve = Reserve::with(['field', 'hour'])->where('id', $id)->firstOrFail();
        return response()->json(['status' => true, 'data' => $reserve]);
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserve = Reserve::findOrFail($id);
        $reserve->delete();
        return response()->json(['status' => true, 'message' => 'Reserva cancelada.']);
    }
}

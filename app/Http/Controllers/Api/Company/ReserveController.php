<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserve;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $reserve = Reserve::with(['field', 'hour', 'user'])->whereHas('field', function (Builder $query) use ($id) {
            $query->where('id', $id);
        })->get();
        return response()->json(['status' => true, 'data' => $reserve]);
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
        $reserve = Reserve::with(['field', 'hour', 'user'])->where('id', $id)->firstOrFail();
        return response()->json(['status' => true, 'data' => $reserve]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reserve = Reserve::with('hour')->findOrFail($id);
        if ($request->status === 'confirm') {
            $reserve->start_date = Carbon::createFromFormat('Y-m-d G', $reserve->date.' '.$reserve->hour->start + 4 );
        }
        $reserve->status = $request->status;
        $reserve->save();
        return response()->json(['status' => true, 'data' => $reserve]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function next(string $id)
    {
        $reserve = Reserve::with('field')->whereHas('field', function (Builder $query) use ($id) {
            $query->where('id', $id);
        })->whereDate('start_date', '>', Carbon::now())->orderBy('start_date')->first();
        return response()->json(['status' => true, 'data' => $reserve]);
    }
}

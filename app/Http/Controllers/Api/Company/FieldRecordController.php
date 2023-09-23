<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FieldDay;

class FieldRecordController extends Controller
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
    public function storedays(Request $request, string $id)
    {
        $saveArray = [];
        foreach ($request->days as $day) {
            array_push($saveArray, [
                'day' => $day['day'],
                'active' => $day['active'],
                'field_id' =>  intval($id),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        FieldDay::insert($saveArray);

        return response()->json(['status' => true, 'data' => intval($id)]);
    }

    /**
     * Display the specified resource.
     */
    public function showdays(string $id)
    {
        $days = FieldDay::where('field_id', $id)
                            ->select('day', 'active')
                            ->get();

        $showArray = [];
        foreach ($days as $value) {
            $showArray[$value['day']] = $value['active'];
        }

        return response()->json(['status' => true, 'data' => $showArray]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatedays(Request $request, string $id)
    {
        $currents = FieldDay::where('field_id', $id)->get();

        foreach ($request->days as $day) {
            $currentDay = $currents->where('day', $day['day'])->first();

            if ($currentDay->active !== $day['active']) {
                FieldDay::where('field_id', $id)
                            ->where('day', $day['day'])
                            ->update(['active' => $day['active']]);
            }
        }
        $newDays = FieldDay::where('field_id', $id)->select('day', 'active')->get();
        return response()->json(['status' => true, 'data' => $newDays]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

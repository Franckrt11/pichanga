<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FieldDay;
use App\Models\FieldHour;

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

    public function showhours(string $id)
    {
        $days = FieldDay::with('hours:id,start,end,field_day_id')->where('field_id', $id)->get();

        $filtered = [];
        $same = false;

        foreach ($days as $day) {
            $filtered[$day->day] = $day->hours;
        }
        // Ver si es same o no same

        

        return response()->json(['status' => true, 'data' => $filtered, 'same' => $same]);
    }

    public function storehours(Request $request, string $id)
    {
        $days = FieldDay::where('field_id', $id)->where('active', 1)->select('id', 'day')->get();

        if ($request->same) {
            foreach ($days as $day) {
                foreach ($request->hours as $hours) {
                    FieldHour::create([
                        'start' => $hours['from'],
                        'end' => $hours['to'],
                        'field_day_id' => $day->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
        } else {
            foreach ($request->hours as $keyDay => $hours) {
                if (empty($hours)) continue;
                foreach ($hours as $hour) {
                    FieldHour::create([
                        'start' => $hour['from'],
                        'end' => $hour['to'],
                        'field_day_id' => $days->where('day', $keyDay)->first()->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
        }

        return response()->json(['status' => true]);
    }

    public function updatehours(Request $request, string $id)
    {
        //
    }
}

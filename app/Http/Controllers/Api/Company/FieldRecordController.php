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
        $days = FieldDay::with('hours')->where('field_id', $id)->get();
        $filtered = [];

        foreach ($days as $day) {
            $filtered[$day->day] = $day->hours;
        }

        return response()->json(['status' => true, 'data' => $filtered]);
    }

    public function storehours(Request $request, string $id)
    {
        $days = FieldDay::where('field_id', $id)->where('active', 1)->select('id', 'day')->get();

        foreach ($request->hours as $keyDay => $hours) {
            if (empty($hours)) continue;
            foreach ($hours as $hour) {
                FieldHour::create([
                    'start' => $hour['start'],
                    'end' => $hour['end'],
                    'position' => $hour['position'],
                    'field_day_id' => $days->where('day', $keyDay)->first()->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        return response()->json(['status' => true]);
    }

    public function updatehours(Request $request, string $id)
    {
        $days = FieldDay::with('hours')->where('field_id', $id)->where('active', 1)->select('id', 'day')->get();

        foreach ($request->hours as $key_day => $hours_array) {
            if (empty($hours_array)) continue;

            $field_day = $days->where('day', $key_day)->first();

            $saved_ids = $field_day->hours->pluck('id')->toArray();
            $request_ids = array_column($hours_array, 'id');
            $diff_ids = array_diff($saved_ids, $request_ids);

            if (!empty($diff_ids)) {
                FieldHour::destroy($diff_ids);
            }

            foreach ($hours_array as $hour_object) {
                if (array_key_exists('id', $hour_object)) {
                    $edit_hour = FieldHour::find($hour_object['id']);
                    $edit_hour->start = $hour_object['start'];
                    $edit_hour->end = $hour_object['end'];
                    $edit_hour->position = $hour_object['position'];
                    $edit_hour->save();
                } else {
                    FieldHour::create([
                        'start' => $hour_object['start'],
                        'end' => $hour_object['end'],
                        'position' => $hour_object['position'],
                        'field_day_id' => $field_day->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
        }

        return response()->json(['status' => true]);
    }
}

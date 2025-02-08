<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\FieldImage;
use App\Models\FieldDay;

class FieldController extends Controller
{
    public function index()
    {
        $list = Field::take(20)->get();
        return response()->json(['status' => true, 'data' => $list]);
    }

    public function show(string $id)
    {
        $field = Field::with(['company', 'district', 'city', 'country'])->findOrFail($id);
        return response()->json(['status' => true, 'data' => $field]);
    }

    public function picture(string $id)
    {
        $pictures = FieldImage::where('field_id', intval($id))->orderBy('position')->get();
        return response()->json(['status' => true, 'data' => $pictures]);
    }

    public function showdays(string $id)
    {
        $days = FieldDay::with('hours')->where('field_id', $id)
                    ->where('active', true)
                    ->get();

        return response()->json(['status' => true, 'data' => $days]);
    }
}

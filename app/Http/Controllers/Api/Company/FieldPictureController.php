<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FieldImage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class FieldPictureController extends Controller
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
        $timestamp = time();
        $filename = "company-field-{$timestamp}.jpg";
        $image = Image::make($request->picture)->resize(800, 500)->encode('jpg', 60);
        Storage::disk('public')->put("company/field/{$filename}", $image->stream());

        $picture = FieldImage::create([
            'filename' => $filename,
            'position' => intval($request->position),
            'field_id' => intval($request->field_id)
        ]);

        return response()->json(['status' => true, 'data' => $picture]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pictures = FieldImage::where('field_id', intval($id))->orderBy('position')->get();
        return response()->json(['status' => true, 'data' => $pictures]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $old_picture = FieldImage::find($id);
        Storage::disk('public')->delete("company/field/{$old_picture->filename}");
        $old_picture->delete();

        $timestamp = time();
        $filename = "company-field-{$timestamp}.jpg";
        $image = Image::make($request->picture)->resize(800, 500)->encode('jpg', 60);
        Storage::disk('public')->put("company/field/{$filename}", $image->stream());

        $picture = FieldImage::create([
            'filename' => $filename,
            'position' => intval($request->position),
            'field_id' => intval($request->field_id)
        ]);

        if ($picture) {
            $all_pictures = FieldImage::where('field_id', intval($request->field_id))->orderBy('position')->get();
            return response()->json(['status' => true, 'data' => $all_pictures]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $picture = FieldImage::find(intval($id));
        Storage::disk('public')->delete("company/field/{$picture->filename}");
        $field_id = $picture->field_id;
        $picture->delete();

        $remaining = FieldImage::where('field_id', $field_id)->orderBy('position')->get();

        $remaining->each(function ($picture, $key) {
            $picture->position = $key + 1;
            $picture->save();
        });

        return response()->json(['status' => true, 'data' => $remaining]);
    }
}

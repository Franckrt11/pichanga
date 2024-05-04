<?php

use Illuminate\Support\Facades\Route;
// use App\Models\FieldDay;

Route::get('/', function () {
    return view('home');
});

// Route::get('days', function () {
//     $field_id = 2;
//     $days = FieldDay::with('hours:id,start,end,field_day_id')->where('field_id', $field_id)->get();
//     $filtered = [];
//     foreach ($days as $day) {
//         $filtered[$day->day] = $day->hours;
//     }
//     dd($filtered);
// });

require __DIR__.'/admin.php';

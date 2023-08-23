<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookingsExport implements FromView
{
    public function view(): View
    {
        return view('exports.bookings', [
            'bookings' => Booking::with(['user', 'field'])->get()
        ]);
    }
}

<?php

namespace App\Http\Livewire\Pages\Booking;

use Livewire\Component;
use App\Models\Booking;
use Livewire\WithPagination;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;

class Home extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function exportExcel()
    {
        return Excel::download(new BookingsExport, 'reservas.xlsx');
    }

    public function exportTxt()
    {
        return Excel::download(new BookingsExport, 'reservas.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function render()
    {
        return view('livewire.pages.booking.home', [
            'bookings' => Booking::with(['user', 'field'])->paginate(10),
        ])->layout('layouts.admin');
    }
}

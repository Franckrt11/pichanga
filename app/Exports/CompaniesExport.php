<?php

namespace App\Exports;

use App\Models\Company;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CompaniesExport implements FromView
{
    public function view(): View
    {
        return view('exports.companies', [
            'companies' => Company::withCount('fields')->get()
        ]);
    }
}

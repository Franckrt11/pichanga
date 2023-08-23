<?php

namespace App\Http\Livewire\Pages\Companies;

use Livewire\Component;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Exports\CompaniesExport;
use Maatwebsite\Excel\Facades\Excel;

class Home extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        if ($company->photo){
            Storage::delete('companies/'.$company->photo);
        }
        $company->delete();
        $this->resetPage();
    }

    public function deleteCompany($id)
    {
        $this->emit('deleteListener', $id);
    }

    public function switchStatus($id)
    {
        $company = Company::findOrFail($id);
        $company->status = !$company->status;
        $company->save();
        $this->resetPage();
    }

    public function exportExcel()
    {
        return Excel::download(new CompaniesExport, 'empresas.xlsx');
    }

    public function exportTxt()
    {
        return Excel::download(new CompaniesExport, 'empresas.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function render()
    {
        return view('livewire.pages.companies.home', [
            'companies' => Company::withCount('fields')->paginate(10),
        ])->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Pages\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class Home extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user->photo){
            Storage::delete('users/'.$user->photo);
        }
        $user->delete();
        $this->resetPage();
    }

    public function deleteClient($id)
    {
        $this->emit('deleteListener', $id);
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'clientes.xlsx');
    }

    public function exportTxt()
    {
        return Excel::download(new UsersExport, 'clientes.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function doSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search !== '') {
            $keyword = $this->search;
            $query = User::where(function ($query) use($keyword) {
                                $query->where('name', 'like', '%' . $keyword . '%')
                                        ->orWhere('lastname', 'like', '%' . $keyword . '%')
                                        ->orWhere('email', 'like', '%' . $keyword . '%');
                            })->paginate(10);
        } else {
            $query = User::paginate(10);
        }

        return view('livewire.pages.users.home', [
            'users' => $query
        ])->layout('layouts.admin');
    }
}

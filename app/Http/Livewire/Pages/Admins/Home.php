<?php

namespace App\Http\Livewire\Pages\Admins;

use Livewire\Component;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin->id == Auth::user()->id) {
            $this->dispatchBrowserEvent('toast-alert', [
                'icon' => 'error',
                'message' => 'No puedes borarte a ti mismo.'
            ]);
            return;
        }
        $admin->delete();
        $this->resetPage();
    }

    public function deleteAdmin($id)
    {
        $this->emit('deleteListener', $id);
    }

    public function render()
    {
        return view('livewire.pages.admins.home', [
            'admins' => Admin::paginate(10),
        ])->layout('layouts.admin');
    }
}

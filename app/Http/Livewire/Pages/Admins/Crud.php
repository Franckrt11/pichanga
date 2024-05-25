<?php

namespace App\Http\Livewire\Pages\Admins;

use Livewire\Component;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class Crud extends Component
{
    public $typecrud;
    public $data;
    public $admin;

    public function mount($id)
    {
        if ( $id === 'nuevo') {
            $this->typecrud = 'Nuevo';
            $this->admin = new Admin;
            $this->data = [
                'name' => '',
                'email' => '',
                'role' => '',
                'password' => '',
                'confirm_password' => ''
            ];
        } else {
            $this->typecrud = 'ID: '.$id;
            $this->admin = Admin::findOrFail($id);
            $this->data = [
                'name' => $this->admin->name,
                'email' => $this->admin->email,
                'role' => $this->admin->role,
                'password' => '***********',
                'confirm_password' => '***********'
            ];
        }
    }

    public function save()
    {
        if( $this->data['email'] == '' ) {
            $this->dispatchBrowserEvent('toast-alert', [
                'icon' => 'warning',
                'message' => 'El correo es requerido.'
            ]);
            return;
        }

        if( $this->data['password'] !== $this->data['confirm_password'] ) {
            $this->dispatchBrowserEvent('toast-alert', [
                'icon' => 'warning',
                'message' => 'La contraseña no es la misma'
            ]);
            return;
        }

        $this->admin->name = $this->data['name'];
        $this->admin->email = $this->data['email'];
        $this->admin->role = $this->data['role'];
        if ($this->typecrud == 'Nuevo') {
            $this->admin->password = Hash::make($this->data['password']);
        }
        $this->admin->save();
        return redirect()->route('panel.admins.crud', [ 'id' => $this->admin->id ]);
    }

    public function resetPassword()
    {
        $status = Password::sendResetLink(
            ['email' => $this->data['email'] ]
        );

        if ( $status == Password::RESET_LINK_SENT ) {
            $this->dispatchBrowserEvent('toast-alert', [
                'icon' => 'success',
                'message' => __($status)
            ]);
            if ($this->admin->id == Auth::user()->id) {
                Auth::logout();
                return redirect()->route('panel.login');
            }
        } else {
            $this->dispatchBrowserEvent('toast-alert', [
                'icon' => 'error',
                'message' => __($status)
            ]);
        }
        return;
    }


    public function render()
    {
        return view('livewire.pages.admins.crud')
                ->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Pages\Companies;

use Livewire\Component;
use App\Models\Company;
use App\Models\Field;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class Crud extends Component
{
    public $typecrud;
    public $data;
    public $company;
    public $fields;

    public function mount($id)
    {
        if ( $id === 'nuevo') {
            $this->typecrud = 'Nuevo';
            $this->company = new Company;
            $this->data = [
                'name' => '',
                'ruc' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => ''
            ];
        } else {
            $this->typecrud = 'ID: '.$id;
            $this->company = Company::findOrFail($id);
            $this->data = [
                'name' => $this->company->name,
                'ruc' => $this->company->ruc,
                'email' => $this->company->email,
                'password' => '***********',
                'confirm_password' => '***********'
            ];
            $this->fields = Field::where('company_id', $this->company->id)->get();
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

        $this->company->name = $this->data['name'];
        $this->company->email = $this->data['email'];
        $this->company->ruc = $this->data['ruc'];
        if ($this->typecrud == 'Nuevo') {
            $this->company->password = Hash::make($this->data['password']);
        }
        $this->company->save();
        return redirect()->route('panel.companies.crud', [ 'id' => $this->company->id ]);
    }

    public function resetPassword()
    {
        //
    }

    public function deleteField($id)
    {
        $field = Field::findOrFail($id);
        // Borrar Fotos
        $field->delete();
        $this->fields->refresh();
    }

    public function render()
    {
        return view('livewire.pages.companies.crud')->layout('layouts.admin');
    }
}

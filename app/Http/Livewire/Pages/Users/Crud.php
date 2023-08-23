<?php

namespace App\Http\Livewire\Pages\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class Crud extends Component
{
    use WithFileUploads;

    public $typecrud;
    public $data;
    public $user;
    public $switchLabel;

    public $imageUploaded;

    public function mount($id)
    {
        $this->typecrud = 'ID: '.$id;
        $this->user = User::findOrFail($id);
        $this->data = [
            'name' => $this->user->name,
            'lastname' => $this->user->lastname,
            'email' => $this->user->email,
            'phone' => $this->user->phone,
            'birth' => $this->user->birth->format('d-m-Y'),
            'sex' => $this->user->sex,
            'status' => $this->user->status,
            'photo' => $this->user->photo,
        ];
    }

    public function save()
    {
        if ($this->imageUploaded) {
            $imagefilename = 'user-'.time().'.jpg';

            $resized = Image::make($this->imageUploaded)
                        ->resize(350, 350, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode('jpg', 60);
            Storage::put('users/'.$imagefilename, $resized->stream());
            $this->user->photo = $imagefilename;
        }

        $this->user->name = $this->data['name'];
        $this->user->lastname = $this->data['lastname'];
        $this->user->email = $this->data['email'];
        $this->user->phone = $this->data['phone'];
        $this->user->birth = $this->data['birth'];
        $this->user->sex = $this->data['sex'];
        $this->user->status = $this->data['status'];
        $this->user->name = $this->data['name'];
        $this->user->save();
        return redirect()->route('users.crud', [ 'id' => $this->user->id ]);
    }

    public function deletePhoto()
    {
        if ($this->data['photo']) {
            Storage::delete('users/'.$this->data['photo']);
            $this->user->photo = NULL;
            $this->user->save();
            return redirect()->route('users.crud', [ 'id' => $this->user->id ]);
        } else {
            $this->dispatchBrowserEvent('toast-alert', [
                'icon' => 'warning',
                'message' => 'El perfil no tiene foto.'
            ]);
        }
    }

    public function render()
    {
        $this->switchLabel = $this->data['status'] == TRUE ? 'HABILITADO' : 'INHABILITADO';
        return view('livewire.pages.users.crud')->layout('layouts.admin');
    }
}

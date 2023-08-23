<?php

namespace App\Http\Livewire\Pages\Companies;

use Livewire\Component;
use App\Models\Field as Cancha;
use App\Models\FieldImage;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class Field extends Component
{
    use WithFileUploads;

    public $company;
    public $typecrud;
    public $data;
    public $field;
    public $images;

    public $portraitUploaded;
    public $galleryUploaded;

    public function mount($id, $fid)
    {
        if ( $fid === 'nuevo') {
            $this->typecrud = 'Nuevo';
            $this->field = new Cancha;
            $this->data = [
                'name' => '',
                'phone' => '',
                'mobile' => '',
                'parking' => '',
                'size' => '',
                'type' => '',
                'players' => '',
                'games' => [],
                'country' => '',
                'city' => '',
                'district' => '',
                'address' => '',
                'map' => '',
                'portrait' => NULL,
            ];
        } else {
            $this->typecrud = 'ID: '.$fid;
            $this->field = Cancha::findOrFail($fid);
            $this->data = [
                'name' => $this->field->name,
                'phone' => $this->field->phone,
                'mobile' => $this->field->mobile,
                'parking' => $this->field->parking,
                'size' => $this->field->size,
                'type' => $this->field->type,
                'players' => $this->field->players,
                'games' => json_decode($this->field->games),
                'country' => $this->field->country,
                'city' => $this->field->city,
                'district' => $this->field->district,
                'address' => $this->field->address,
                'map' => $this->field->map,
                'portrait' => $this->field->portrait,
            ];
            $this->reloadImages();
        }
        $this->company = $id;
    }

    public function reloadImages()
    {
        $this->images = FieldImage::where('field_id', $this->field->id)->get();
    }

    public function save($marker)
    {
        if ($this->portraitUploaded) {
            if ($this->data['portrait']) {
                Storage::delete('fields/'.$this->data['portrait']);
            }

            $imagefilename = 'field-'.time().'.jpg';

            $resized = Image::make($this->portraitUploaded)
                        ->resize(350, 350, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode('jpg', 60);
            Storage::put('fields/'.$imagefilename, $resized->stream());
            $this->field->portrait = $imagefilename;
        }

        if ($this->typecrud === 'Nuevo') {
            $this->field->active = TRUE;
        }

        $this->field->name = $this->data['name'];
        $this->field->phone = $this->data['phone'];
        $this->field->mobile = $this->data['mobile'];
        $this->field->parking = $this->data['parking'];
        $this->field->size = $this->data['size'];
        $this->field->type = $this->data['type'];
        $this->field->players = $this->data['players'];
        $this->field->games = json_encode($this->data['games']);
        $this->field->country = $this->data['country'];
        $this->field->city = $this->data['city'];
        $this->field->district = $this->data['district'];
        $this->field->address = $this->data['address'];
        $this->field->map = $marker;
        $this->field->company_id = $this->company;
        $this->field->save();
        return redirect()->route('companies.field', [
            'id' => $this->company,
            'fid' => $this->field->id
        ]);
    }

    public function saveImage()
    {
        if ($this->galleryUploaded) {
            $imagefilename = 'field-'.time().'.jpg';

            $resized = Image::make($this->galleryUploaded)
                        ->resize(350, 350, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode('jpg', 60);
            Storage::put('fields/'.$imagefilename, $resized->stream());

            $image = new FieldImage;
            $image->filename = $imagefilename;
            $image->position = $this->images->count() + 1;
            $image->field_id = $this->field->id;
            $image->save();

            $this->reloadImages();

            $this->dispatchBrowserEvent('toast-alert', [
                'icon' => 'success',
                'message' => 'Foto guardada.'
            ]);
        }
    }

    public function deleteImage($id)
    {
        $image = FieldImage::findOrFail($id);
        Storage::delete('fields/'.$image->filename);
        $image->delete();
        $this->reloadImages();
    }

    public function render()
    {
        return view('livewire.pages.companies.field')->layout('layouts.admin');
    }
}

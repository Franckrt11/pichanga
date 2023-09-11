<?php

namespace App\Http\Livewire\Pages\Config;

use Livewire\Component;
use App\Models\Config;

class Contact extends Component
{
    public $phone;
    public $mail;

    public $phoneText;
    public $mailText;

    public function mount()
    {
        $this->phone = Config::where('type', 'phone')->first();
        $this->phoneText = $this->phone->value;

        $this->mail = Config::where('type', 'mail')->first();
        $this->mailText = $this->mail->value;
    }

    public function saveConfig()
    {
        $this->phone->value = $this->phoneText;
        $this->phone->save();
        $this->mail->value = $this->mailText;
        $this->mail->save();

        $this->dispatchBrowserEvent('toast-alert', [
            'icon' => 'success',
            'message' => 'Datos guardados.'
        ]);
    }

    public function render()
    {
        return view('livewire.pages.config.contact')
                ->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Pages\Config;

use Livewire\Component;
use App\Models\Config;

class Privacy extends Component
{
    public $privacy;
    public $privacyText;

    public function mount()
    {
        $this->privacy = Config::where('type', 'privacy')->first();
        $this->privacyText = $this->privacy->value;
    }

    public function saveConfig($content)
    {
        $this->privacy->value = $content;
        $this->privacy->save();

        $this->dispatchBrowserEvent('toast-alert', [
            'icon' => 'success',
            'message' => 'Datos guardados.'
        ]);
    }

    public function render()
    {
        return view('livewire.pages.config.privacy')
                ->layout('layouts.admin');
    }
}

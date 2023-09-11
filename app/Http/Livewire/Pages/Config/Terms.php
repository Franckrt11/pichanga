<?php

namespace App\Http\Livewire\Pages\Config;

use Livewire\Component;
use App\Models\Config;

class Terms extends Component
{
    public $terms;
    public $termsText;

    public function mount()
    {
        $this->terms = Config::where('type', 'terms')->first();
        $this->termsText = $this->terms->value;
    }

    public function saveConfig($content)
    {
        $this->terms->value = $content;
        $this->terms->save();

        $this->dispatchBrowserEvent('toast-alert', [
            'icon' => 'success',
            'message' => 'Datos guardados.'
        ]);
    }

    public function render()
    {
        return view('livewire.pages.config.terms')
                ->layout('layouts.admin');
    }
}

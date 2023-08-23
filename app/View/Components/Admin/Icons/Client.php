<?php

namespace App\View\Components\Admin\Icons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Client extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $types,
        public ?string $photo
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.icons.client');
    }
}

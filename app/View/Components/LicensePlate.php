<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LicensePlate extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $carId,
        public bool $loopLast,
        public bool $isOnParking,
        public string $licensePlate
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.license-plate');
    }
}

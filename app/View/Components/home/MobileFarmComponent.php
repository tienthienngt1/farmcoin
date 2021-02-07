<?php

namespace App\View\Components\home;

use Illuminate\View\Component;

class MobileFarmComponent extends Component
{
    public data;
    public vet;
    public function __construct($data, $vet)
    {
        $this->data = $data;
        $this->vet = $vet;
    }

    public function render()
    {
        return view('components.home.mobile-farm-component');
    }
}

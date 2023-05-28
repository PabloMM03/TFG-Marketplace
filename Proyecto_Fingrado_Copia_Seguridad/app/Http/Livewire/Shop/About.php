<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.shop.about')->extends('layouts.app')->section('content');
    }
}

<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class ContactComponent extends Component
{
    public function render()
    {
        return view('livewire.shop.contact-component')->extends('layouts.app')->section('content');
    }
}

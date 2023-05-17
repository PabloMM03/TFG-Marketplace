<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class PoliticasDePrivacidad extends Component
{
    public function render()
    {
        return view('livewire.shop.politicas-de-privacidad')->extends('layouts.app')->section('content');
    }
}

<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProducRecentComponent extends Component
{
    use WithPagination;
    
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }


    //Collect the most recent products created
    public function render()
    {
        $recents = Product::latest()
                            ->where('status', 2)
                            ->where('name', 'LIKE','%'.$this->search . '%')
                            ->take(20)->get();
        return view('livewire.shop.produc-recent-component', compact('recents'))->extends('layouts.app')->section('content');
    }
}

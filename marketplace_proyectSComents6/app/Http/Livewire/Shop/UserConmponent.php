<?php

namespace App\Http\Livewire\Shop;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserConmponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('livewire.orders.index-component', compact('orders'))->extends('layouts.app')->section('content');
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('livewire.orders.view-component', compact('orders'))->extends('layouts.app')->section('content');
    }


}

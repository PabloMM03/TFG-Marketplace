<?php

namespace App\Http\Livewire\Shop;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListIconComponent extends Component
{
    public function render()
    {
        $wishlist_items = Wishlist::where('user_id', Auth::id())->get();       
        return view('livewire.shop.wish-list-icon-component', compact('wishlist_items'));
    }
}

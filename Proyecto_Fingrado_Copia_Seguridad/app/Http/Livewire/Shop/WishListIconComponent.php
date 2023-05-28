<?php

namespace App\Http\Livewire\Shop;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListIconComponent extends Component
{
    public function render()
    {
        // Retrieve wishlist items for the currently authenticated user
        $wishlist_items = Wishlist::where('user_id', Auth::id())->get();

        // Render the 'livewire.shop.wish-list-icon-component' view, passing the 'wishlist_items' variable to it
        return view('livewire.shop.wish-list-icon-component', compact('wishlist_items'));
    }
}

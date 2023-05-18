<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function creating(Product $product)
    {
        //Check if the product creation is running from the console
        if(! \App::runningInConsole()){
            $product->user_id = auth()->user()->id;
        }
    }

   
    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleting(Product $product)
    {
        if($product->image){
            Storage::delete($product->image->url);
        }
    }

   
}

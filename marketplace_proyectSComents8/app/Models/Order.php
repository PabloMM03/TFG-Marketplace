<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    public function items()
    {
       /**
        * Relationship between tables of orders, products You are specified with withPivot which fields to access
        */
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('price', 'quantity');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderitems()
    {

        return $this->hasmany(OrderItem::class);
    }

}



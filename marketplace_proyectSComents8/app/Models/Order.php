<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
            'user_id',
            'shipping_fname',
            'shipping_lname',
            'shipping_address1',
            'shipping_address2',
            'shipping_city',
            'shipping_state',
            'shipping_zipcode',
            'shipping_phone',
            'payment_method',
            'status',
            'email',
    ];



    public function items()
    {
       /**
        * Relationship between tables of orders, products You are specified with withPivot which fields to access
        */
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'prod_id')->withPivot('price', 'qty');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderitems()
    {

        return $this->hasmany(OrderItem::class);
    }

}



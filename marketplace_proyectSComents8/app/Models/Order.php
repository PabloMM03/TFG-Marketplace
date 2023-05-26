<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * Define a many-to-many relationship with the Product model through the OrderItem model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'prod_id')->withPivot('price', 'qty');
    }

    /**
     * Define a belongs-to relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define a one-to-many relationship with the OrderItem model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }


}



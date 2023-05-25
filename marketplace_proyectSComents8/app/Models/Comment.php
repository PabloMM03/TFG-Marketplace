<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;


class Comment extends Model
{
    use HasFactory;

 protected $table = 'comments';

 protected $fillable = [
    'product_id',
    'user_id',
    'comment_body',
    'email',
    'name'
 ];

 /**
  * Relate to the products table to add the comment to that product
  */
public function product()
{
    return $this->belongsTo(Product::class, 'product_id', 'id');
}

/**
 * Relationship to the user table to add the comment to that product
 */
public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}

public function likes()
{
    return $this->belongsToMany(User::class, 'comment_likes', 'comment_id', 'user_id');
}

protected $withCount = ['likes'];


}

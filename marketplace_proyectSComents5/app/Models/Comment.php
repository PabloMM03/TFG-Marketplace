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
    'comment_body'
 ];

public function product()
{
    return $this->belongsTo(Product::class, 'product_id', 'id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}


}

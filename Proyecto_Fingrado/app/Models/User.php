<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Fortify\TwoFactorAuthenticatable;
// use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    // use HasProfilePhoto, TwoFactorAuthenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected $appends = [
    //     'profile_photo_url',
    // ];


    /**
     * Define a one-to-many relationship with the Product model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Define a many-to-many relationship with the Product model through the "transactions" table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function purchasedProducts()
    {
        return $this->belongsToMany(Product::class, 'transactions', 'user_id', 'product_id');
    }

    /**
     * Define a many-to-many relationship with the Comment model through the "comment_likes" table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function likeComments()
    {
        return $this->belongsToMany(Comment::class, 'comment_likes', 'user_id', 'comment_id');
    }


    

    
}

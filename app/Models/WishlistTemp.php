<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistTemp extends Model
{
    protected $table = 'wishlist_temp';

    protected $primaryKey = 'wishlist_temp_id';

    protected $keyType = 'int';

    protected $fillable = [
        'wishlist_temp_id',
        'wishlist_temp_cookie_name ',
        'wishlist_list',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

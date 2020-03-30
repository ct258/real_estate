<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistTemp extends Model
{
    protected $table = 'wishlist_temp';

    protected $primaryKey = 'wishlist_temp_id';

    protected $keyType = 'int';

    protected $fillable = [
        'customer_id',
        'real_estate_id',
        'wishlist_temp_id',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}

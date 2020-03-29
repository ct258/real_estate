<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';

    protected $primaryKey = 'wishlist_id';

    protected $keyType = 'int';

    protected $fillable = [
        'customer_id',
        'real_estate_id',
        'wishlist_id',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}

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
        'wishlist_id',
        'wishlist_list',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

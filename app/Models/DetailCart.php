<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailCart extends Model
{
    protected $table = 'detail_cart';

    protected $primaryKey = 'detail_cart_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'detail_cart_id',
        'detail_cart_price',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}

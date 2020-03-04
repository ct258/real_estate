<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $primaryKey = 'cart_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'customer_id',
        'cart_id',
        'cart_unit',
        'cart_discount',
        'cart_total',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

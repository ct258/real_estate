<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $primaryKey = 'cart_id';

    protected $keyType = 'int';

    protected $fillable = [
        'customer_id',
        'payment_id',
        'status_id',
        'code_id',
        'cart_id',
        'cart_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    // protected $dates = ['deleted_at'];
}

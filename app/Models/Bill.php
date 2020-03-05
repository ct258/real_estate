<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';

    protected $primaryKey = 'bill_id';

    protected $keyType = 'int';

    protected $fillable = [
        'status_id',
        'staff_id',
        'cart_id',
        'payment_id',
        'bill_id',
        'bill_datetime',
        'bill_total',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

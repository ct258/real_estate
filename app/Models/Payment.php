<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $primaryKey = 'payment_id';

    protected $keyType = 'int';

    protected $fillable = [
        'payment_id',
        'payment_code',
        'payment_name',
        'payment_image',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}

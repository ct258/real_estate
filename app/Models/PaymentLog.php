<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    protected $table = 'payment_log';

    protected $primaryKey = 'payment_log_id';

    protected $keyType = 'int';

    protected $fillable = [
        'bill_id',
        'payment_log_id',
        'payment_log_code',
        'payment_log_datetime',
        'payment_log_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

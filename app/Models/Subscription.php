<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';

    protected $primaryKey = 'subscription_id';

    protected $keyType = 'int';

    protected $fillable = [
        'customer_id',
        // 'type_id',
        // 'province_id',
        // 'district_id',
        'subscription_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    protected $table = 'real_estate';

    protected $primaryKey = 'real_estate_id';

    protected $keyType = 'int';

    protected $fillable = [
        'type_id',
        'status_id',
        'brokerage_fee_id',
        'ward_id',
        'street_id',
        'direction_id',
        'customer_id',
        'real_estate_id',
        'real_estate_name',
        'real_estate_acreage',
        'real_estate_price',
        'real_estate_descrpition',
        'real_estate_address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

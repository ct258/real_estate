<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailFee extends Model
{
    protected $table = 'detail_fee';

    protected $primaryKey = 'detail_fee_id';

    protected $keyType = 'int';

    protected $fillable = [
        'brokerage_id',
        'real_estate_id',
        'detail_fee_id',
        'detail_fee_from',
        'detail_fee_to',
        'detail_fee_total_money',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}

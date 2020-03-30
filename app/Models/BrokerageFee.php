<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerageFee extends Model
{
    protected $table = 'brokerage_fee';

    protected $primaryKey = 'brokerage_fee_id';

    protected $keyType = 'int';

    protected $fillable = [
        'brokerage_fee_id',
        'brokerage_fee_code',
        'brokerage_fee_price',
    ];

    public $timestamps = false;
}

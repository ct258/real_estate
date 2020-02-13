<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleContract extends Model
{
    protected $table = 'sale_contract';

    protected $primaryKey = 'sale_contract_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'sale_contract_id',
        'sale_contract_code',
        'sale_contract_nameA',
        'sale_contract_nameB',
        'sale_contract_sign_day',
        'sale_contract_total_money',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

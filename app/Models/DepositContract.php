<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositContract extends Model
{
    protected $table = 'deposit_contract';

    protected $primaryKey = 'deposit_contract_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'deposit_contract_id',
        'deposit_contract_code',
        'deposit_contract_nameA',
        'deposit_contract_nameB',
        'deposit_contract_sign_day',
        'deposit_contract_total_money',
        'deposit_contract_term',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

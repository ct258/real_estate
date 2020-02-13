<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageDepositContract extends Model
{
    protected $table = 'image_deposit_contract';

    protected $primaryKey = 'image_deposit_contract_id';

    protected $keyType = 'int';

    protected $fillable = [
        'image_id',
        'deposit_contract_id',
        'image_deposit_contract_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

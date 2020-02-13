<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageSaleContract extends Model
{
    protected $table = 'image_sale_contract';

    protected $primaryKey = 'image_sale_contract_id';

    protected $keyType = 'int';

    protected $fillable = [
        'image_id',
        'sale_contract_id',
        'image_sale_contract_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

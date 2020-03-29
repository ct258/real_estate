<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageContract extends Model
{
    protected $table = 'image_contract';

    protected $primaryKey = 'image_contract_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'image_contract_id',
        'image_contract_path',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTemp extends Model
{
    protected $table = 'detail_temp';

    protected $primaryKey = 'detail_temp_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'cart_temp_id',
        'detail_temp_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    // protected $dates = ['deleted_at'];
}

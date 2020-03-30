<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartTemp extends Model
{
    protected $table = 'cart_temp';

    protected $primaryKey = 'cart_temp_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'cookie_user_id',
        'code_id',
        'cart_temp_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
}

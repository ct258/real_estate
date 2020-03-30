<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewProduct extends Model
{
    protected $table = 'view_product';

    protected $primaryKey = 'view_product_id';

    protected $keyType = 'int';

    protected $fillable = [
        'view_product_id',
        'cookie_user_id',
        'real_estate_id',
    ];

    public $timestamps = false;
}

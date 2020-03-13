<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewedProduct extends Model
{
    protected $table = 'viewed_product';

    protected $primaryKey = 'viewed_product_id';

    protected $keyType = 'int';

    protected $fillable = [
        'viewed_product_id',
        'viewed_product_cookie_name ',
        'viewed_product_list',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

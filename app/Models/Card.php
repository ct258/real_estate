<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'card';

    protected $primaryKey = 'card_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'customer_id',
        'card_id',
        'card_unit',
        'card_discount',
        'card_total',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

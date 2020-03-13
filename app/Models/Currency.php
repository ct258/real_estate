<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';

    protected $primaryKey = 'currency_id';

    protected $keyType = 'int';

    protected $fillable = [
        'currency',
        'currency_name',
        'currency_rate',
        'currency_symbol',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

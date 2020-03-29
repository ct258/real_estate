<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'code';

    protected $primaryKey = 'code_id';

    protected $keyType = 'int';

    protected $fillable = [
        'staff_id',
        'customer_id',
        'rank_id',
        'type_id',
        'real_estate_id',
        'code_type_id',
        'code_id',
        'code_name',
        'code_note',
        'code_code',
        'code_amount',
        'code_count',
        'code_min',
        'code_max',
        'code_per',
        'code_begin',
        'code_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

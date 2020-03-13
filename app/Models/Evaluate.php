<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    protected $table = 'evalute';

    protected $primaryKey = 'evalute_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'customer_id',
        'evalute_id',
        'evalute_reply',
        'evalute_title',
        'evalute_content',
        'evalute_rank',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

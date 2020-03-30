<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    protected $table = 'evaluate';

    protected $primaryKey = 'evaluate_id';

    protected $keyType = 'int';

    protected $fillable = [
        'real_estate_id',
        'customer_id',
        'evaluate_id',
        'evaluate_reply',
        'evaluate_title',
        'evaluate_content',
        'evaluate_status',
        'evaluate_rank',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

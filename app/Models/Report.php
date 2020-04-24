<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    protected $primaryKey = 'report_id';

    protected $keyType = 'int';

    protected $fillable = [
        'customer_id',
        'real_estate_id',
        'report_id',
        'report_content',
        'report_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

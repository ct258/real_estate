<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $primaryKey = 'status';

    protected $keyType = 'int';

    protected $fillable = [
        'status_id',
        // 'status_code',
        'status_name',
        'status_reason',
        'status_note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

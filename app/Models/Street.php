<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $table = 'street';

    protected $primaryKey = 'street_id';

    protected $keyType = 'int';

    protected $fillable = [
        // 'province_id',
        'district_id',
        'street_id',
        'street_name',
        'street_prefix',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}

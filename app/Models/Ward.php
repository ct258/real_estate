<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'ward';

    protected $primaryKey = 'ward_id';

    protected $keyType = 'int';

    protected $fillable = [
        // 'province_id',
        'district_id',
        'ward_id',
        'ward_name',
        'ward_prefix',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}

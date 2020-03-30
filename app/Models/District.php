<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
        protected $table = 'district';

    protected $primaryKey = 'district_id';

    protected $keyType = 'int';

    protected $fillable = [
        'province_id',
        'district_id',
        'district_name',
        'district_prefix',
    ];

    public $timestamps = false;
}

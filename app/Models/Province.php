<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';

    protected $primaryKey = 'province_id';

    protected $keyType = 'int';

    protected $fillable = [
        'province_id',
        'province_name',
        'province_prefix',
    ];

    public $timestamps = false;
    // protected $dates = ['deleted_at'];
}

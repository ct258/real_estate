<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinhThanhPho extends Model
{
    protected $table = 'tinhthanhpho';

    protected $primaryKey = 'ttp_ma';

    protected $keyType = 'string';

    protected $fillable = [
        'ttp_ma',
        'ttp_ten',
        'ttp_ghichu',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    public $incrementing = false;
}

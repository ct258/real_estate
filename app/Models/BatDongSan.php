<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatDongSan extends Model
{
    protected $table = 'batdongsan';

    protected $primaryKey = 'bds_id';

    protected $keyType = 'int';

    protected $fillable = [
        'bds_id',
        'loaibds_id',
        'bds_ten',
        'bds_dientich',
        'bds_gia',
        'bds_mota',
        'bds_loaidat',
        'bds_diachi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

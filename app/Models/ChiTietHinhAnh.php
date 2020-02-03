<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietHinhAnh extends Model
{
    protected $table = 'chitiethinhanh';

    protected $primarykey = 'ctha_id';

    protected $keytype = 'int';

    protected $fillable = [
        'ctha_id',
        'bds_id',
        'ha_id',
        'ctha_mota',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamp = true;
    protected $dates = ['deleted_at'];
}

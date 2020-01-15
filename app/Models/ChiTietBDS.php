<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctbds extends Model
{
    protected $table = 'chitietbds';

    protected $primaryKey = 'ctbds_id';

    protected $keyType = 'int';

    protected $fillable = [
        'ctbds_id',
        'ctbds_ten',
        'ctbds_dientich',
        'ctbds_gia',
        'ctbds_mota',
        'ctbds_loaidat',
        'ctbds_diachi',
        
    ];
    public $timestamps = true;
}
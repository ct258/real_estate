<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'hddatcoc';

    protected $primaryKey = 'hdmb_id';

    protected $keyType = 'int';

    protected $fillable = [
    'hddc_id',
    'hddc_ma',
    'hddc_tiencoc',
    'hddc_ngaydc',
    ];
    public $timestamps = true;
}

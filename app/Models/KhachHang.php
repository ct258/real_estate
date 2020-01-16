<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class KhachHang extends Model
{
    protected $table = 'khachhang';

    protected $primaryKey = 'kh_id';

    protected $keyType = 'int';

    protected $fillable = [
        'kh_id',
        'kh_hoten',
        'kh_ngaysinh',
        'kh_sdt',
        'kh_diachi',
        'kh_cmnd',
        'kh_ngaycap',
        'kh_noicap',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

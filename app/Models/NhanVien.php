<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'nhanvien';

    protected $primaryKey = 'nv_id';

    protected $keyType = 'int';

    protected $fillable = [
        'nv_id',
        'nv_ma',
        'nv_ten',
        'nv_gioitinh',
        'nv_sdt',
        'nv_diachi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}

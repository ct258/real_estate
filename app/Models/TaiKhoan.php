<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class KhachHang extends Model
{
    protected $table = 'taikhoan';

    protected $primaryKey = 'tk_id';

    protected $keyType = 'int';

    protected $fillable = [
        'tk_id',
        'tk_taikhoan',
        'tk_matkhau',
        'remembertoken',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

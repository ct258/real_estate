<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];
    public $timestamps = true;
}

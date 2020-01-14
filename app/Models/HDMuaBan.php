<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'hdmuaban';

    protected $primaryKey = 'hdmb_id';

    protected $keyType = 'int';

    protected $fillable = [
        'hdmb_id',
        'hdmb_ma',
        'hdmb_ngayki',
        'hdmb_noidung',
        'hdmb_ghichu',
    ];
    public $timestamps = true;
}

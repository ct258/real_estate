<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HDMuaBan extends Model
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
        'created_at',
        'updated_at',
        'deleted_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucThanhToan extends Model
{
    protected $table = 'hinhthucthanhtoan';

    protected $primarykey = 'httt_id';

    protected $keytype = 'int';

    protected $fillable = [
        'httt_id',
        'httt_ten',
        'httt_mota',
    ];

    public $timestamp = true;
}

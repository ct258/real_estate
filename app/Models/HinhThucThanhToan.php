<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucThanhToan extends Model
{
    protected $table = 'hinhthucthanhtoan';

    protected $primaryKey = 'httt_id';
    
    protected $keyType = 'int';

    protected $fillable = [
        'httt__id',
        'httt__ten',
        'httt_mota',
        
        
    ];
    public $timestamps = true;
}

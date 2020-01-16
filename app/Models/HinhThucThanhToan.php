<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HinhThucThanhToan extends Model
{
    protected $table = 'hinhthucthanhtoan';

    protected $primaryKey = 'httt_id';
    
    protected $keyType = 'int';

    protected $fillable = [
        'httt__id',
        'httt__ten',
        'httt_mota',
        'created_at',
        'updated_at',
        'deleted_at',
        
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

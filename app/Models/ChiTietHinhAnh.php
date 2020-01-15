<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHinhAnh extends Model
{
    protected $table = 'chitiethinhanh';
    
    protected $primarykey = 'ctha_id';

    protected $keytype = 'int';

    protected $fillable = [
        'ctha_id',
        'ctha_ten',
        'ctha_mota',
    ];
    public $timestamp =true;
}

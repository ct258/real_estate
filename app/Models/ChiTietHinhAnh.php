<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ChiTietHinhAnh extends Model
{
    protected $table = 'chitiethinhanh';
    
    protected $primarykey = 'ctha_id';

    protected $keytype = 'int';

    protected $fillable = [
        'ctha_id',
        'ctha_ten',
        'ctha_mota',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamp =true;
    protected $dates = ['deleted_at'];
}

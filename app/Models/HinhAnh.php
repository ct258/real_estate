<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    protected $tbale = 'hinhanh';

    protected $primarykey = 'ha_id';

    protected $keytype = 'int';

    protected $fillable = [
        'ha_id',
        'ha_duongdan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamp = true;
    protected $dates = ['deleted_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    protected $tbale = 'hinhanh';

    protected $primarykey = 'ha_id';

    protected $keytype = 'int';

    protected $fillable =[
        'ha_id',
        'ha_duongdan',
    ];
     public $timestamp = true;

}

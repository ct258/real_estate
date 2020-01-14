<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DuAn extends Model
{
    protected $table = 'duan';

    protected $primaryKey = 'da_id';

    protected $keyType = 'int';

    protected $fillable = [
        'da_id',
        'da_ten',
        'da_gia',
        'da_diachi',
        'da_trangthai',
        'da_mota',
        
    ];
    public $timestamps = true;
}

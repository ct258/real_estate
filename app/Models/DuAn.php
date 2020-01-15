<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DuAn extends Model
{
    use SoftDeletes;
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
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

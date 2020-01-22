<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuongPho extends Model
{
    protected $table = 'duongpho';

    protected $primaryKey = 'dp_id';

    protected $keyType = 'int';

    protected $fillable = [
        'dp_id',
        'dp_ten',
        'dp_ghichu',
        'ttq_id',
        'qh_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

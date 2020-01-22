<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhuongXa extends Model
{
    protected $table = 'phuongxa';

    protected $primaryKey = 'px_id';

    protected $keyType = 'int';

    protected $fillable = [
        'px_id',
        'px_ten',
        'px_ghichu',
        'ttp_id',
        'qh_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

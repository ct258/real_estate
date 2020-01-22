<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    protected $table = 'quanhuyen';

    protected $primaryKey = 'qh_id';

    protected $keyType = 'int';

    protected $fillable = [
        'qh_id',
        'qh_ten',
        'qh_ghichu',
        'ttq_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
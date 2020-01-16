<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PhiMoiGioi extends Model
{
    protected $table = 'phimoigioi';

    protected $primaryKey = 'pmg_id';

    protected $keyType = 'int';

    protected $fillable = [
        'pmg_id',
        'pmg_gia',
        'pmg_mota',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

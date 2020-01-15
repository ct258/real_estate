<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhiMoiGioi extends Model
{
    protected $table = 'phimoigioi';

    protected $primaryKey = 'pmg_id';

    protected $keyType = 'int';

    protected $fillable = [
        'pmg_id',
        'pmg_gia',
        'pmg_mota',
    ];
    public $timestamps = true;
}

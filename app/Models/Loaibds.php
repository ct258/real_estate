<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loaibds extends Model
{
    protected $table = 'loaibds';

    protected $primaryKey = 'loaibds_id';

    protected $keyType = 'int';

    protected $fillable = [
        'loaibds_id',
        'nhucau_id',
        'loaibds_ten',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
